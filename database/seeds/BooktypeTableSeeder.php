<?php

use Illuminate\Database\Seeder;

use App\Booktype;

class BooktypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bt1=new Booktype();
        $bt1->type_name="Hikaye Kitapları";
        $bt1->url=SeoFriendlyUrl($bt1->type_name);
        $bt1->save();

        $bt2=new Booktype();
        $bt2->type_name="Anne Baba Kitapları";
        $bt2->url=SeoFriendlyUrl($bt2->type_name);
        $bt2->save();

        $bt2=new Booktype();
        $bt2->type_name="Eğitimsel Kitaplar";
        $bt2->url=SeoFriendlyUrl($bt2->type_name);
        $bt2->save();

        $bt2=new Booktype();
        $bt2->type_name="Etkinlik Kitapları";
        $bt2->url=SeoFriendlyUrl($bt2->type_name);
        $bt2->save();

       


    }
}
