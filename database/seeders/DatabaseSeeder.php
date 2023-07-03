<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Poster\Models\Poster;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @type array<string, string>
     */
    private const POSTERS = [
        'Ezerins' => '1.png',
        'Juveliera Jubileja' => '2.png',
        'Oligarhs' => '3.png',
        'Bernu Izklaides Un Saldumu Izstade' => '4.png',
        'Aukle' => '5.png',
        'Organismi' => '6.png',
        'Curļonis Un Dzezs' => '7.png',
        'Davanu Karte' => '8.png',
        'Arsts' => '9.png',
        'Latvijas Radio Koris' => '10.png',
    ];

    public function run(): void
    {
        foreach (self::POSTERS as $key => $value) {
            Poster::factory()->create([
                'name' => $key,
                'file_name' => $value,
            ]);
        }
    }
}
