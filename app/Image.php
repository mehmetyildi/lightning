<?php

namespace App;

use App\Post;

use Illuminate\Http\UploadedFile;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    protected $fillable=['image_url'];

    public function imagable(){

    	return $this->morphTo();
    }

    public static function nameImage(UploadedFile $file){

    	$say1=rand(20000,32000);
        $say2=rand(20000,32000);
        $say3=rand(20000,32000);
        $say4=rand(20000,32000);
        $benzersizad=$say1.$say2.$say3.$say4;
        $filename=$benzersizad.$file->getClientOriginalName();
        $destination='/images/';
        $destinationpath=base_path('/public/images/');
        $file->move($destinationpath,$filename);
        $image_url=$destination.$filename;
        return $image_url;

    }
}
