<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'name',
        'companyName',
        'emailAddress',
        'telephoneNumber',
        'user_id',
    ];

    public function getAllCardsbyId($user_id){
        $cards = DB::table('cards')
            ->Where("user_id", "=", $user_id)
            ->select('cards.*')
            ->get();

        return $cards;
    }
}
