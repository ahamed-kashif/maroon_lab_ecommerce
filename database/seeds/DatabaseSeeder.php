<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(VariantSeeder::class);
        $this->call(ShippingMethodSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(UsersListSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(OderSeeder::class);
        $this->call(PageSeeder::class);
//        $this->call(SliderPermissionSeeder::class);
    }
}
