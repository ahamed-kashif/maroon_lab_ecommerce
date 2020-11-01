<?php
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit payment_method']);
        Permission::create(['name' => 'delete payment_method']);
        Permission::create(['name' => 'create payment_method']);
        Permission::create(['name' => 'index payment_method']);
        Permission::create(['name' => 'show payment_method']);
        Permission::create(['name' => 'update payment_method']);
        Permission::create(['name' => 'api_get payment_method']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());

    }
}
