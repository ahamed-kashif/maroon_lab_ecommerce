<?php

use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersListSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'index userslist']);

        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());

    }
}
