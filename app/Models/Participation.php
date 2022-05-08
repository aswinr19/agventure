<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    public function auction(){

        $this->belongsTo(Auction::class);
    }

    public function user(){

        $this->belongsTo(User::class);
    }
}
