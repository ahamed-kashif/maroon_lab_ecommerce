<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit page']);
        Permission::create(['name' => 'delete page']);
        Permission::create(['name' => 'create page']);
        Permission::create(['name' => 'index page']);
        Permission::create(['name' => 'show page']);
        Permission::create(['name' => 'update page']);
        Permission::create(['name' => 'api_get page']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());
    }
}
