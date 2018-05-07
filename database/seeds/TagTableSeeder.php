<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$tag1=new Tag();
    	$tag1->name="Çocuk psikolojisi";
        $tag1->url=SeoFriendlyUrl($tag1->name);
    	$tag1->save();

    	$tag2=new Tag();
    	$tag2->name="Ergen psikolojisi";
        $tag2->url=SeoFriendlyUrl($tag2->name);
    	$tag2->save();

    	$tag3=new Tag();
    	$tag3->name="Çocuk istismarı";
        $tag3->url=SeoFriendlyUrl($tag3->name);
    	$tag3->save();

    	$tag4=new Tag();
    	$tag4->name="Sınav kaygısı";
        $tag4->url=SeoFriendlyUrl($tag4->name);
    	$tag4->save();

    	$tag5=new Tag();
    	$tag5->name="Evlilik";
        $tag5->url=SeoFriendlyUrl($tag5->name);
    	$tag5->save();

    	$tag6=new Tag();
    	$tag6->name="Bilişsel metodlar";
        $tag6->url=SeoFriendlyUrl($tag6->name);
    	$tag6->save();


    }
}
