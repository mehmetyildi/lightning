<?php

use Illuminate\Database\Seeder;

use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $s1=new State();
        $s1->name="pending";
        $s1->description="Adminler tarafından yazılmış onay sürecinde olan makaleler";
        $s1->save();


        $s2=new State();
        $s2->name="rejected";
        $s2->description="Kabul edilemeyecek kadar kötü makaleler";
        $s2->save();


        $s3=new State();
        $s3->name="revise";
        $s3->description="Küçük değişiklikler gerektiren makaleler";
        $s3->save();


        $s4=new State();
        $s4->name="approved";
        $s4->description="Onaylanan makaleler";
        $s4->save();


    }
}
