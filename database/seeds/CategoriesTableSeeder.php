<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_name = ['HTML', 'CSS', 'JS', 'VUE', 'PHP', 'LARAVEL'];
        foreach ($category_name as $name) {
            $category = new Category();
            $category->name = $name;
            $category->slug = Str::slug($name, '-');
            $category->save();
        }
    }
}
