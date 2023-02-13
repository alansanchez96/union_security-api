<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(7)->create()
            ->each(function ($client) {
                Image::factory(2)->create([
                    'url' => 'clients/' . fake()->image('public/storage/clients', 640, 480, null, false),
                    'imageable_id' => $client->id,
                    'imageable_type' => Client::class
                ]);
            });
    }
}
