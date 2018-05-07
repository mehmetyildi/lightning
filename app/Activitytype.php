<?php

namespace App;

use App\Activity;

use Illuminate\Database\Eloquent\Model;

class Activitytype extends Model
{
    //
    public function activities(){
    	return $this->hasMany(Activity::class);
    }

     public function activitiesPublished(){
    	return $this->activities()->where('publish','1');
    }
}
