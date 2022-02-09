<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction;

class Item extends Model
{
    use HasFactory;


    //relationship
    public function user(){

        return $this->belongsTo(User::class);

    }

    public function auction(){
        return $this->hasOne(Auction::class);
    }
}
