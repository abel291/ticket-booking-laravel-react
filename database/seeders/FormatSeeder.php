<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats = [
            'Clase',
            'Conferencia',
            'Festival',
            'Fiesta',
            'Apariencia',
            'Atracción',
            'Convención',
            'Exposición',
            'Gala',
            'Juego',
            'Redes',
            'Actuación',
            'Carrera',
            'Reunión',
            'Retiro',
            'Seminario',
            'Torneo',
            'Recorrido',
        ];
        Format::truncate();
        foreach ($formats as $key => $value) {
            Format::factory()->create([
                'name' => ucfirst($value),
                'slug' => Str::slug($value),
            ]);
        }
    }
}
