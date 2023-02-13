<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Tag;
use App\Models\Scope;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('clients');
        Storage::makeDirectory('clients');

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'lastname' => 'Test',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        Category::factory(7)->create();
        $this->call(ClientSeeder::class);
        Tag::factory(15)->create();
        Scope::factory(3)->create();
        About::factory()->create();
    }
}
