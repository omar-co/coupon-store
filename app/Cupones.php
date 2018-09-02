<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    protected $fillable = ['string', 'points', 'used', 'user_id'];
}
