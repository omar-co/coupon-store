<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public static function boot()
    {
        parent::boot();
        self::saving(function ($history){
            $history->user_id = auth()->id();
        });
    }
}
