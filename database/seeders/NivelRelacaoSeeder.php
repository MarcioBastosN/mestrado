<?php

namespace Database\Seeders;

use App\Models\NivelRelacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelRelacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        NivelRelacao::create(['nivel' => 1, 'score' => 30]);
        NivelRelacao::create(['nivel' => 2, 'score' => 60]);
        NivelRelacao::create(['nivel' => 3, 'score' => 90]);
        NivelRelacao::create(['nivel' => 4, 'score' => 120]);
        NivelRelacao::create(['nivel' => 5, 'score' => 150]);
        NivelRelacao::create(['nivel' => 6, 'score' => 180]);
        NivelRelacao::create(['nivel' => 7, 'score' => 210]);
        NivelRelacao::create(['nivel' => 8, 'score' => 240]);
        NivelRelacao::create(['nivel' => 9, 'score' => 270]);
        NivelRelacao::create(['nivel' => 10, 'score' => 300]);

    }
}
