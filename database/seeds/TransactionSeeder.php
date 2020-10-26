<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'delete transaction']);
        Permission::create(['name' => 'index transaction']);
        Permission::create(['name' => 'update transaction']);
        Permission::create(['name' => 'api_get transaction']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo('index transaction');
    }
}
