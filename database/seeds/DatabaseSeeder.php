<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Role comes before User seeder here.
    	$this->call(RoleTableSeeder::class);
  // User seeder will use the roles above created.
    	$this->call(UserTableSeeder::class);
    	$this->call(HomepageTableSeeder::class);
    	$this->call(HakkimizdaTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(PostTableSeeder::class);
        
        $this->call(CategoryTableSeeder::class);
        $this->call(VideosSeeder::class);
        $this->call(BooktypeTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(ActivitytypeTableSeeder::class);
        $this->call(ActivityTableSeeder::class);

        
    }
}
