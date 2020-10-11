<?php

use App\Models\VariantType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class VariantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit variantType']);
        Permission::create(['name' => 'delete variantType']);
        Permission::create(['name' => 'create variantType']);
        Permission::create(['name' => 'index variantType']);
        Permission::create(['name' => 'show variantType']);
        Permission::create(['name' => 'update variantType']);
        Permission::create(['name' => 'api_get variantType']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo('show variantType');
        factory(VariantType::class, 10)->create();
    }
}
