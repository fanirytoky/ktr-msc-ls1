<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
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

    public function getAllCardsById(){
        $user_id = auth()->user()->id;
        $liCards = Card::getAllCardsbyId($user_id);
        return view('Acceuil', ['cards' => $liCards]);
    }
}
