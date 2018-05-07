<?php

use Illuminate\Database\Seeder;

use App\Hakkimizda;



class HakkimizdaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $about=new Hakkimizda();
        $about->image_url="/images/29357307962301422141Sketch003.jpg";
        $about->title="Lorem ipsum dolor sit amet";
        $about->body="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Hac habitasse platea dictumst quisque sagittis purus. At consectetur lorem donec massa. Et tortor at risus viverra. Tincidunt eget nullam non nisi est sit amet facilisis magna. Ornare aenean euismod elementum nisi. Dignissim convallis aenean et tortor at risus viverra adipiscing. Volutpat sed cras ornare arcu dui vivamus. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Consequat interdum varius sit amet mattis vulputate enim. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Amet justo donec enim diam vulputate. Morbi tristique senectus et netus et. Vitae aliquet nec ullamcorper sit. Enim sed faucibus turpis in eu mi. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi.

        Volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Ut pharetra sit amet aliquam id. Sed viverra ipsum nunc aliquet. Elementum integer enim neque volutpat ac tincidunt vitae semper. Tincidunt dui ut ornare lectus sit amet est. Massa placerat duis ultricies lacus sed turpis tincidunt id. Cras adipiscing enim eu turpis egestas pretium aenean. Aliquet nibh praesent tristique magna sit amet purus. Curabitur gravida arcu ac tortor. Sit amet porttitor eget dolor. Morbi leo urna molestie at elementum eu. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Lorem donec massa sapien faucibus et. Libero id faucibus nisl tincidunt. Tellus elementum sagittis vitae et. Ac auctor augue mauris augue neque gravida. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Donec adipiscing tristique risus nec feugiat.</p>";
        $about->tel="0850 526 58 78";
        $about->email="superadmin@superadmin.com";
        $about->save();
    }
}
