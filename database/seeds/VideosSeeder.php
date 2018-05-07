<?php

use Illuminate\Database\Seeder;

use App\Tag;

use App\Video;

use Carbon\Carbon;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	$video1=new Video();
        $video1->approved_at=Carbon::now();
    	$video1->user_id=3;
        $video1->hit=2321;
        $video1->like=568;
        $video1->dislike=3;
        $video1->publish=1;
        $video1->state_id=4;
    	$video1->category_id=2;
        $video1->created_at=Carbon::now()->subMonth();
    	$video1->video_link="<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$video1->title="Sevdiğim bir şarkı";
        $video1->url=SeoFriendlyUrl($video1->title);
    	$video1->publish=1;
    	$video1->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $video1->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.";
        $video1->body_small="Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
    	$video1->save();
    	$video1->tags()->attach(Tag::find(1));

    	$video2=new Video();
        $video2->approved_at=Carbon::now();
    	$video2->user_id=2;
        $video2->hit=3453;
        $video2->like=608;
        $video2->dislike=23;
    	$video2->category_id=2;
    	$video2->video_link="<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$video2->title="Eğitici bir oyun şarkı";
        $video2->url=SeoFriendlyUrl($video2->title);
    	$video2->publish=1;
    	$video2->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $video2->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.";
        $video2->body_small="Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
    	$video2->save();
    	$video2->tags()->attach(Tag::find(1));
    	$video2->tags()->attach(Tag::find(3));

    	$video3=new Video();
    	$video3->user_id=3;
        $video3->created_at=Carbon::now()->subMonth();
        $video3->approved_at=Carbon::now()->subMonth();
        $video3->publish=1;
        $video3->state_id=4;
    	$video3->category_id=3;
    	$video3->video_link="<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$video3->title="Eğitici bir şarkı";
        $video3->url=SeoFriendlyUrl($video3->title);
    	$video3->publish=1;
    	$video3->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $video3->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.";
        $video3->body_small="Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
    	$video3->save();
    	$video3->tags()->attach(Tag::find(5));

    	$video4=new Video();
        $video4->approved_at=Carbon::now()->subMonth();
    	$video4->user_id=2;
        $video4->created_at=Carbon::now()->subMonth();
    	$video4->category_id=5;
    	$video4->video_link="<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$video4->title="Bu da öyle video işte";
        $video4->url=SeoFriendlyUrl($video4->title);
    	$video4->publish=1;
    	$video4->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $video4->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.";
        $video4->body_small="Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
    	$video4->save();
    	$video4->tags()->attach(Tag::find(2));
    	$video4->tags()->attach(Tag::find(3));

    	$video5=new Video();
        $video5->approved_at=Carbon::now();
        $video5->user_id=3;
        $video5->publish=1;
        $video5->state_id=4;
    	$video5->category_id=5;
    	$video5->video_link="<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WibVR2YKx-k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
    	$video5->title="Fena, çok fena!";
        $video5->url=SeoFriendlyUrl($video5->title);
    	$video5->publish=1;
    	$video5->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Id interdum velit laoreet id donec. Nunc congue nisi vitae suscipit tellus mauris a. Mi sit amet mauris commodo quis imperdiet. Turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices.";
        $video5->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec. Vitae turpis massa sed elementum tempus. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.";
        $video5->body_small="Rhoncus dolor purus non enim praesent elementum facilisis. Convallis tellus id interdum velit laoreet id donec.";
    	$video5->save();
    	$video5->tags()->attach(Tag::find(1));

    }
}
