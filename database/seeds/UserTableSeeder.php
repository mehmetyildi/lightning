<?php

use Illuminate\Database\Seeder;

use App\Role;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	$role_user = Role::where('name', 'user')->first();
    	$role_admin  = Role::where('name', 'admin')->first();
    	$role_superadmin  = Role::where('name', 'superadmin')->first();

    	$user = new User();
    	$user->name = 'user';
        $user->url=SeoFriendlyUrl($user->name);
    	$user->email = 'user@user.com';
    	$user->password = bcrypt('123456');
    	$user->save();
    	$user->roles()->attach($role_user);

    	$admin = new User();
    	$admin->name = 'Admin';
        $admin->url=SeoFriendlyUrl($admin->name);
    	$admin->email = 'admin@admin.com';
    	$admin->password = bcrypt('123456');
    	$admin->save();
    	$admin->roles()->attach($role_admin);
        $admin->roles()->attach($role_user);

    	$superadmin = new User();
    	$superadmin->name = 'Super Admin';
        $superadmin->url=SeoFriendlyUrl($superadmin->name);
    	$superadmin->email = 'superadmin@superadmin.com';
    	$superadmin->password = bcrypt('123456');
    	$superadmin->save();
    	$superadmin->roles()->attach($role_superadmin);
        $superadmin->roles()->attach($role_admin);
        $superadmin->roles()->attach($role_user);

    }
}
