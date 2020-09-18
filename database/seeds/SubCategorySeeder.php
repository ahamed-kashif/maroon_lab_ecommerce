<?php

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit subcategory']);
        Permission::create(['name' => 'delete subcategory']);
        Permission::create(['name' => 'create subcategory']);
        Permission::create(['name' => 'index subcategory']);
        Permission::create(['name' => 'show subcategory']);
        Permission::create(['name' => 'update subcategory']);
        Permission::create(['name' => 'api_get subcategory']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo('show subcategory');
        factory(SubCategory::class, 10)->create();
    }
}
