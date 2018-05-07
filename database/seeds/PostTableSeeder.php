<?php

use Illuminate\Database\Seeder;

use App\Post;

use App\Tag;

use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tag1=Tag::find(1);
    	$tag2=Tag::find(2);
    	$tag3=Tag::find(3);
    	$tag4=Tag::find(4);
    	$tag5=Tag::find(5);
    	$tag6=Tag::find(6);



    	$post1=new Post();
        $post1->created_at=Carbon::now()->subMonth();
        $post1->approved_at=Carbon::now()->subMonth();
    	$post1->user_id=2;
        $post1->hit=12321;
        $post1->like=1568;
        $post1->dislike=43;
    	$post1->image_url="/images/21071208233190125126logo.jpg";
    	$post1->category_id=1;
    	$post1->title="Eyvah çocuğum büyüyor";
        $post1->url=SeoFriendlyUrl($post1->title);
    	$post1->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

    		Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
        $post1->body_medium="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.</p>";
        $post1->body_small="<p>Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate.</p>";
    	$post1->save();
    	$post1->tags()->attach($tag2);
    	$post1->tags()->attach($tag1);
    	$post1->tags()->attach($tag3);
    	

    	$post2=new Post();
        $post2->created_at=Carbon::now()->subMonth();
        $post2->approved_at=Carbon::now()->subMonth();
    	$post2->user_id=3;
        $post2->hit=65767;
        $post2->like=12321;
        $post2->dislike=423;
    	$post2->image_url="/images/21071208233190125126logo.jpg";
    	$post2->category_id=2;
    	$post2->title="İlkokulda okula aidiyet";
        $post2->url=SeoFriendlyUrl($post2->title);
    	$post2->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

    		Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
            $post2->body_medium="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.</p>";
        $post2->body_small="<p>Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate.</p>";
        $post2->publish=1;
        $post2->state_id=4;
    	$post2->save();
    	$post2->tags()->attach($tag1);
    	

    	$post3=new Post();
        $post3->created_at=Carbon::now()->subMonth();
        $post3->approved_at=Carbon::now()->subMonth();
    	$post3->user_id=3;
    	$post3->image_url="/images/21071208233190125126logo.jpg";
    	$post3->category_id=3;
        $post3->publish=1;
        $post3->state_id=4;
    	$post3->title="Evlilikte Seksin Önemi";
        $post3->url=SeoFriendlyUrl($post3->title);
    	$post3->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

    		Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
            $post3->body_medium="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.</p>";
        $post3->body_small="<p>Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate.</p>";
    	$post3->save();
    	$post3->tags()->attach($tag5);
    	$post3->tags()->attach($tag6);

    	$post4=new Post();
    	$post4->user_id=2;
        $post4->approved_at=Carbon::now();
    	$post4->image_url="/images/21071208233190125126logo.jpg";
    	$post4->category_id=4;
    	$post4->title="İsyankar Oğlum";
        $post4->url=SeoFriendlyUrl($post4->title);
    	$post4->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

    		Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
            $post4->body_medium="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.</p>";
        $post4->body_small="<p>Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate.</p>";
    	$post4->save();
    	$post4->tags()->attach($tag2);

    	$post5=new Post();
        $post5->approved_at=Carbon::now();
    	$post5->user_id=3;
        $post5->publish=1;
        $post5->state_id=4;
    	$post5->image_url="/images/21071208233190125126logo.jpg";
    	$post5->category_id=5;
    	$post5->title="Eyvah kızım erkeklerle geziyor";
        $post5->url=SeoFriendlyUrl($post5->title);
    	$post5->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

    		Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
            $post5->body_medium="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.</p>";
        $post5->body_small="<p>Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate.</p>";
    	$post5->save();
    	$post5->tags()->attach($tag2);
    	$post5->tags()->attach($tag4);
    }
}
