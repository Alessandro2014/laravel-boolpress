<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->title = $faker->text(20);
            $post->content = $faker->paragraphs(3, true);
            $post->image = $faker->imageUrl(150, 150);
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        }
    }
}
