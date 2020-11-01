<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit setting']);
        Permission::create(['name' => 'delete setting']);
        Permission::create(['name' => 'create setting']);
        Permission::create(['name' => 'index setting']);
        Permission::create(['name' => 'show setting']);
        Permission::create(['name' => 'update setting']);
        Permission::create(['name' => 'api_get setting']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo('index setting');
    }
}
