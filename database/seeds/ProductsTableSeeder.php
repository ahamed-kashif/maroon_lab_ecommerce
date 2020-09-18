<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'index product']);
        Permission::create(['name' => 'show product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'api_get product']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo('show product');
        factory(Product::class, 10)->create();
    }
}
