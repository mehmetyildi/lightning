<?php

use Illuminate\Database\Seeder;

use App\Homepage;

class HomepageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$homepage=new Homepage();
    	$homepage->logo="/images/30327277693153521291Sketch003.jpg";
    	$homepage->title="Rehberlik Atölyesine hoşgeldiniz";
    	$homepage->facebook="https://www.facebook.com/";
    	$homepage->twitter="https://www.twitter.com/";
    	$homepage->instagram="https://www.instagram.com/";
    	$homepage->video_link="<iframe src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$homepage->save();
        //
    }
}
