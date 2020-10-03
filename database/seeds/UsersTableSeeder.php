<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add admin
        $user = User::create(
            [
                'id' 		=> 	1,
                'name'	=>	'Mr. Admin',
                'email'		=>	'admin@maroon.lab',
                'mobile_number' => '01783511730',
                'api_token' => Hash::make(rand()),
                'password'	=>	Hash::make('12345678')
            ]
        );
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);


        $admin_user = User::find(1);
        $admin_user->assignRole('super-admin');
    }
}
