<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaixaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Faixa::factory()->count(500)->create(); //Cria 500 registros de álbum fictícios para fins de teste no banco de dados
    }
}
