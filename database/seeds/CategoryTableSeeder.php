<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category1=new Category();
        $category1->title='Çocuk Psikolojisi';
        $category1->url=SeoFriendlyUrl($category1->title);
        $category1->save();

        $category2=new Category();
        $category2->title='Sosyal Bağlılık';
        $category2->url=SeoFriendlyUrl($category2->title);
        $category2->save();

        $category3=new Category();
        $category3->title='Evlilik';
        $category3->url=SeoFriendlyUrl($category3->title);
        $category3->save();

        $category4=new Category();
        $category4->title='Ergenlik';
        $category4->url=SeoFriendlyUrl($category4->title);
        $category4->save();

        $category5=new Category();
        $category5->title='Cinsel Yönelim';
        $category5->url=SeoFriendlyUrl($category5->title);
        $category5->save();



    }
}
