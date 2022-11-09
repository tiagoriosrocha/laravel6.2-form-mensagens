<?php

use Illuminate\Database\Seeder;
use App\Mensagem;

class MensagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensagem::create([
            "titulo" => "Minha primeira mensagem",
            "autor" => "Tiago Rocha",
            "texto" => "Texto texto texto texto"
        ]);

        Mensagem::create([
            "titulo" => "Minha segunda mensagem",
            "autor" => "Tiago Rocha",
            "texto" => "Texto texto texto texto"
        ]);

        Mensagem::create([
            "titulo" => "Minha terceira mensagem",
            "autor" => "Tiago Rocha",
            "texto" => "Texto texto texto texto"
        ]);
    }
}
