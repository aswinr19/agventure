<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    public function auction(){

        return $this->belongsTo(Auction::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
