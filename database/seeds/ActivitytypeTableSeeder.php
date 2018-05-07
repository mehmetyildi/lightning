<?php

use Illuminate\Database\Seeder;

use App\ActivityType;

class ActivitytypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $at1=new ActivityType();
        $at1->type_name="Sanat Etkinlikleri";
        $at1->url=SeoFriendlyUrl($at1->type_name);
        $at1->save();


        $at2=new ActivityType();
        $at2->type_name="Motor Beceriler";
        $at2->url=SeoFriendlyUrl($at2->type_name);
        $at2->save();


        $at3=new ActivityType();
        $at3->type_name="Duyu Eğitimi";
        $at3->url=SeoFriendlyUrl($at3->type_name);
        $at3->save();


        $at4=new ActivityType();
        $at4->type_name="El-göz Koordinasyonu";
        $at4->url=SeoFriendlyUrl($at4->type_name);
        $at4->save();


        $at5=new ActivityType();
        $at5->type_name="Eğitici Oyuncaklar";
        $at5->url=SeoFriendlyUrl($at5->type_name);
        $at5->save();


        $at6=new ActivityType();
        $at6->type_name="Fen Etkinlikleri";
        $at6->url=SeoFriendlyUrl($at6->type_name);
        $at6->save();


        $at7=new ActivityType();
        $at7->type_name="Matematik Etkinlikleri";
        $at7->url=SeoFriendlyUrl($at7->type_name);
        $at7->save();


        $at8=new ActivityType();
        $at8->type_name="Dil gelişim Etkinlikleri";
        $at8->url=SeoFriendlyUrl($at8->type_name);
        $at8->save();

    }
}
