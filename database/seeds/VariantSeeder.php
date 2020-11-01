<?php

use App\Models\Variant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'edit variant']);
        Permission::create(['name' => 'delete variant']);
        Permission::create(['name' => 'create variant']);
        Permission::create(['name' => 'index variant']);
        Permission::create(['name' => 'show variant']);
        Permission::create(['name' => 'update variant']);
        Permission::create(['name' => 'api_get variant']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());
        factory(Variant::class, 10)->create();
    }
}
