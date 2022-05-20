<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /* Creacion de carpeta posts */
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        /* Creacion de roles de usuario */
        $this->call(RoleSeeder::class);

        /* Creacion de usuarios de prueba */
        $this->call(UserSeeder::class);

        /* Creacion de categorias */
        Category::factory(5)->create();
        
        /* Creacion de etiquetas */
        Tag::factory(10)->create();

        /* Creacion de posts */
        $this->call(PostSeeder::class);

        Cache::flush();
    }
}
