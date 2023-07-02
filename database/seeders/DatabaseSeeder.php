<?php

namespace Database\Seeders;

use App\Modules\Poster\Models\Poster;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @type array<string, string>
     */
    private const POSTERS = [
        'Ezeriņš' => '1.png',
        'Juveliera Jubileja' => '2.png',
        'Oligarhs' => '3.png',
        'Bērnu Izklaides Un Saldumu Izstāde' => '4.png',
        'Aukle' => '5.png',
        'Organismi' => '6.png',
        'Čurļonis Un Džezs' => '7.png',
        'Dāvanu Karte' => '8.png',
        'Ārsts' => '9.png',
        'Latvijas Radio Koris' => '10.png',
    ];

    public function run(): void
    {
        foreach (self::POSTERS as $name => $path) {
            Poster::factory()->create([
                'name' => $name,
                'path' => $path,
            ]);
        }
    }
}
