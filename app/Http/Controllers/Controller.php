<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('Acceuil');
    }

    public function createCard()
    {
        return view('cardNew');
    }

    public function storeCard(Request $request)
    {
        Card::create([
            'name' => $request->name,
            'companyName' => $request->companyName,
            'emailAddress' => $request->emailAddress,
            'telephoneNumber' => $request->telephoneNumber,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/create.card')->withSuccess('New business cards created successfully');
    }

    public function getAllCardsById()
    {
        $user_id = auth()->user()->id;
        $liCards = Card::getAllCardsbyId($user_id);
        return view('Acceuil', ['cards' => $liCards]);
    }

    public function getAllUsers(Request $request)
    {
        $id = $request->idCard;
        $li = DB::select('select * from users where id !=' . auth()->user()->id);
        // dd($li);
        return view('ajaxListUser', ['val' => $li, 'idCard' => $id]);
    }

    public function shareTo($idUser, $idCard)
    {
        Share::create([
            'card_id' => $idCard,
            'user_id' => $idUser
        ]);
        return redirect()->back()->withSuccess('Card shared successfully');
    }

    public function cardInvitation()
    {
        $li = $data = DB::table('shares')
            ->join('cards', 'shares.card_id', '=', 'cards.id')
            ->select('shares.*', 'cards.name', 'cards.emailAddress', 'cards.companyName', 'cards.telephoneNumber')
            ->where("shares.user_id", "=", auth()->user()->id)
            ->where("shares.isAccepted", "=", 0)
            ->get();
        return view('listInvitationCard', ['li' => $li]);
    }

    public function addToMyCard(Request $request)
    {
        $share_id = $request->share_id;
        DB::table('shares')
            ->where('id', $share_id)
            ->update(['isAccepted' => 1]);


        Card::create([
            'name' => $request->name,
            'companyName' => $request->companyName,
            'emailAddress' => $request->emailAddress,
            'telephoneNumber' => $request->telephoneNumber,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->withSuccess('Card added successfully');

    }
}
