<?php

use Illuminate\Database\Seeder;

use App\Book;

use App\Tag;

use Carbon\Carbon;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $book1=new Book();
        $book1->user_id=3;
        $book1->hit=7111;
        $book1->like=1128;
        $book1->dislike=343;
        $book1->created_at=Carbon::now()->subMonth();
        $book1->approved_at=Carbon::now()->subMonth();
        $book1->publish=1;
        $book1->state_id=4;
        $book1->category_id=2;
        $book1->image_url="/images/21071208233190125126logo.jpg";
        $book1->title="Book Title1";
        $book1->url=SeoFriendlyUrl($book1->title);
        $book1->age_begin="2";
        $book1->age_end="3";
        $book1->author="John Doe";
        $book1->translated_by="Ali Veli";
        $book1->publisher="Yıldırım Kitabevi";
        $book1->year="2021";
        $book1->booktype_id=1;
        $book1->publish=1;
        $book1->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $book1->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
        $book1->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $book1->save();
        $book1->tags()->attach(Tag::find(1));


        $book2=new Book();
        $book2->approved_at=Carbon::now()->subMonth();
        $book2->user_id=2;
        $book2->hit=8111;
        $book2->like=1232;
        $book2->dislike=43;
        $book2->category_id=3;
        $book2->created_at=Carbon::now()->subMonth();
        $book2->image_url="/images/21071208233190125126logo.jpg";
        $book2->title="Book Title2";
        $book2->url=SeoFriendlyUrl($book2->title);
        $book2->age_begin="4";
        $book2->age_end="5";
        $book2->author="John Doe";
        $book2->translated_by="Ali Veli";
        $book2->publisher="Yıldırım Kitabevi";
        $book2->year="2021";
        $book2->booktype_id=2;
        $book2->publish=1;
        $book2->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $book2->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
        $book2->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $book2->save();
        $book2->tags()->attach(Tag::find(2));
        $book2->tags()->attach(Tag::find(3));
        $book2->tags()->attach(Tag::find(5));


        $book3=new Book();
        $book3->user_id=3;
        $book3->publish=1;
        $book3->created_at=Carbon::now()->subMonth();
        $book3->approved_at=Carbon::now()->subMonth();
        $book3->state_id=4;
        $book3->category_id=4;
        $book3->image_url="/images/21071208233190125126logo.jpg";
        $book3->title="Book Title3";
        $book3->url=SeoFriendlyUrl($book3->title);
        $book3->age_begin="4";
        $book3->age_end="5";
        $book3->author="Jane Doe";
        $book3->translated_by="Ali Veli";
        $book3->publisher="Yıldırım Kitabevi";
        $book3->year="2021";
        $book3->booktype_id=3;
        $book3->publish=1;
        $book3->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $book3->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
        $book3->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $book3->save();
        $book3->tags()->attach(Tag::find(1));
        $book3->tags()->attach(Tag::find(2));
        $book3->tags()->attach(Tag::find(3));
        $book3->tags()->attach(Tag::find(4));
        $book3->tags()->attach(Tag::find(5));


        $book4=new Book();
        $book4->user_id=2;
        $book4->created_at=Carbon::now()->subMonth();
        $book4->approved_at=Carbon::now()->subMonth();
        $book4->category_id=5;
        $book4->image_url="/images/21071208233190125126logo.jpg";
        $book4->title="Book Title4";
        $book4->url=SeoFriendlyUrl($book4->title);
        $book4->age_begin="2";
        $book4->age_end="3";
        $book4->author="Jeniffer Doe";
        $book4->translated_by="Ali Veli";
        $book4->publisher="Yıldırım Kitabevi";
        $book4->year="2021";
        $book4->booktype_id=4;
        $book4->publish=1;
        $book4->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $book4->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
        $book4->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $book4->save();
        $book4->tags()->attach(Tag::find(5));


        $book5=new Book();
        $book5->approved_at=Carbon::now();
        $book5->user_id=2;
        $book5->publish=1;
        $book5->state_id=4;
        $book5->category_id=1;
        $book5->image_url="/images/21071208233190125126logo.jpg";
        $book5->title="Book Title5";
        $book5->url=SeoFriendlyUrl($book5->title);
        $book5->age_begin="5";
        $book5->age_end="6";
        $book5->author="John Doe";
        $book5->translated_by="Ali Veli";
        $book5->publisher="Yıldırım Kitabevi";
        $book5->year="2021";
        $book5->booktype_id=1;
        $book5->publish=1;
        $book5->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $book5->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
        $book5->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $book5->save();
        $book5->tags()->attach(Tag::find(1));
        $book5->tags()->attach(Tag::find(2));
        $book5->tags()->attach(Tag::find(3));



    }
}
