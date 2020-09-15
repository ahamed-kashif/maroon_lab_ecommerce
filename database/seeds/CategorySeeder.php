<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'index category']);
        Permission::create(['name' => 'show category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'api_get category']);

        factory(Category::class, 10)->create();


    }
}
