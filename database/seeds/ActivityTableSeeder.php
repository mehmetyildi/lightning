<?php

use Illuminate\Database\Seeder;

use App\Activity;

use App\Tag;

use Carbon\Carbon;


class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$activity1=new Activity();
        $activity1->hit=7988;
        $activity1->like=988;
        $activity1->dislike=88;
        $activity1->created_at=Carbon::now()->subMonth();
        $activity1->approved_at=Carbon::now()->subMonth();
    	$activity1->user_id=3;
    	$activity1->category_id=1;
        $activity1->publish=1;
        $activity1->state_id=4;
    	$activity1->image_url="/images/21071208233190125126logo.jpg";
    	$activity1->title="Activity1";
        $activity1->url=SeoFriendlyUrl($activity1->title);
    	$activity1->age_begin=3;
    	$activity1->age_end=6;
    	$activity1->activitytype_id=1;
    	$activity1->publish=1;
    	$activity1->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity1->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity1->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity1->material="malzeme1, malzeme2 ve malzeme3";
    	$activity1->save();
    	$activity1->tags()->attach(Tag::find(1));
    	$activity1->tags()->attach(Tag::find(2));
    	$activity1->tags()->attach(Tag::find(3));


    	$activity2=new Activity();
    	$activity2->user_id=2;
        $activity2->hit=12988;
        $activity2->like=488;
        $activity2->dislike=58;
        $activity2->created_at=Carbon::now()->subMonth();
        $activity2->approved_at=Carbon::now()->subMonth();
    	$activity2->category_id=2;
    	$activity2->image_url="/images/21071208233190125126logo.jpg";
    	$activity2->title="Activity2";
        $activity2->url=SeoFriendlyUrl($activity2->title);
    	$activity2->age_begin=5;
    	$activity2->age_end=6;
    	$activity2->activitytype_id=2;
    	$activity2->publish=1;
    	$activity2->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity2->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity2->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity2->material="malzeme1, malzeme2 ve malzeme3";
    	$activity2->save();
    	$activity2->tags()->attach(Tag::find(3));
    	$activity2->tags()->attach(Tag::find(4));
    	$activity2->tags()->attach(Tag::find(5));


    	$activity3=new Activity();
    	$activity3->user_id=3;
        $activity3->created_at=Carbon::now()->subMonth();
        $activity3->approved_at=Carbon::now()->subMonth();
        $activity3->publish=1;
        $activity3->state_id=4;
    	$activity3->category_id=3;
    	$activity3->image_url="/images/21071208233190125126logo.jpg";
    	$activity3->title="Activity3";
        $activity3->url=SeoFriendlyUrl($activity3->title);
    	$activity3->age_begin=6;
    	$activity3->age_end=7;
    	$activity3->activitytype_id=3;
    	$activity3->publish=1;
    	$activity3->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity3->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity3->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity3->material="malzeme1, malzeme2 ve malzeme3";
    	$activity3->save();
    	$activity3->tags()->attach(Tag::find(3));
    	$activity3->tags()->attach(Tag::find(4));
    	


    	$activity4=new Activity();
        $activity4->approved_at=Carbon::now();
    	$activity4->user_id=2;
    	$activity4->category_id=4;
    	$activity4->image_url="/images/21071208233190125126logo.jpg";
    	$activity4->title="Activity4";
        $activity4->url=SeoFriendlyUrl($activity4->title);
    	$activity4->age_begin=2;
    	$activity4->age_end=4;
    	$activity4->activitytype_id=4;
    	$activity4->publish=1;
    	$activity4->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity4->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity4->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity4->material="malzeme1, malzeme2 ve malzeme3";
    	$activity4->save();
    	$activity4->tags()->attach(Tag::find(1));
    	


    	$activity5=new Activity();
        $activity5->approved_at=Carbon::now();
    	$activity5->user_id=3;
        $activity5->publish=1;
        $activity5->state_id=4;
    	$activity5->category_id=5;
    	$activity5->image_url="/images/21071208233190125126logo.jpg";
    	$activity5->title="Activity5";
        $activity5->url=SeoFriendlyUrl($activity5->title);
    	$activity5->age_begin=3;
    	$activity5->age_end=6;
    	$activity5->activitytype_id=5;
    	$activity5->publish=1;
    	$activity5->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity5->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity5->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity5->material="malzeme1, malzeme2 ve malzeme3";
    	$activity5->save();
    	$activity5->tags()->attach(Tag::find(1));
    	$activity5->tags()->attach(Tag::find(3));
    	$activity5->tags()->attach(Tag::find(5));


    	$activity6=new Activity();
        $activity6->approved_at=Carbon::now();
    	$activity6->user_id=2;
    	$activity6->category_id=1;
    	$activity6->image_url="/images/21071208233190125126logo.jpg";
    	$activity6->title="Activity6";
        $activity6->url=SeoFriendlyUrl($activity6->title);
    	$activity6->age_begin=2;
    	$activity6->age_end=5;
    	$activity6->activitytype_id=6;
    	$activity6->publish=1;
    	$activity6->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity6->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity6->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity6->material="malzeme1, malzeme2 ve malzeme3";
    	$activity6->save();
    	$activity6->tags()->attach(Tag::find(4));
    	$activity6->tags()->attach(Tag::find(2));



    	$activity7=new Activity();
        $activity7->approved_at=Carbon::now();
    	$activity7->user_id=2;
    	$activity7->category_id=2;
    	$activity7->image_url="/images/21071208233190125126logo.jpg";
    	$activity7->title="Activity7";
        $activity7->url=SeoFriendlyUrl($activity7->title);
    	$activity7->age_begin=3;
    	$activity7->age_end=6;
    	$activity7->activitytype_id=7;
    	$activity7->publish=1;
    	$activity7->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity7->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity7->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity7->material="malzeme1, malzeme2 ve malzeme3";
    	$activity7->save();
    	$activity7->tags()->attach(Tag::find(5));
    	$activity7->tags()->attach(Tag::find(4));
    	$activity7->tags()->attach(Tag::find(3));


    	$activity8=new Activity();
        $activity8->approved_at=Carbon::now();        
    	$activity8->user_id=2;
    	$activity8->category_id=3;
    	$activity8->image_url="/images/21071208233190125126logo.jpg";
    	$activity8->title="Activity8";
        $activity8->url=SeoFriendlyUrl($activity8->title);
    	$activity8->age_begin=4;
    	$activity8->age_end=7;
    	$activity8->activitytype_id=8;
    	$activity8->publish=1;
    	$activity8->body="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt. Sit amet porttitor eget dolor morbi non arcu. Porta nibh venenatis cras sed felis. Nec sagittis aliquam malesuada bibendum arcu. Consequat semper viverra nam libero justo laoreet sit amet. Nisl pretium fusce id velit ut. Pellentesque elit eget gravida cum sociis.";
        $activity8->body_medium="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Feugiat nibh sed pulvinar proin gravida. Ultricies mi eget mauris pharetra et ultrices. Tellus rutrum tellus pellentesque eu tincidunt.";
        $activity8->body_small="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    	$activity8->material="malzeme1, malzeme2 ve malzeme3";
    	$activity8->save();
    	$activity8->tags()->attach(Tag::find(1));
    	$activity8->tags()->attach(Tag::find(2));
    	$activity8->tags()->attach(Tag::find(3));




    }
}
