<?php
use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit shipping_method']);
        Permission::create(['name' => 'delete shipping_method']);
        Permission::create(['name' => 'create shipping_method']);
        Permission::create(['name' => 'index shipping_method']);
        Permission::create(['name' => 'show shipping_method']);
        Permission::create(['name' => 'update shipping_method']);
        Permission::create(['name' => 'api_get shipping_method']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());
        factory(ShippingMethod::class, 10)->create();
    }
}
