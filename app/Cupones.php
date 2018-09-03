<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    protected $fillable = ['string', 'points', 'used', 'user_id'];

    public static function byString($string)
    {
        return self::where('string', $string)->where('used', 0)->first();
    }


}
