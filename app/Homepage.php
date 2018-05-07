<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    //

    public static function get_homepage(){

    	return static::find(1)->get();
    }
}
