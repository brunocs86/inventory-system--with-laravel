<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call(ProdutoTableSeeder::class);
    }
}

class ProdutoTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('produtos')->insert([
        ['nome' => 'Geladeira', 'quantidade' => 2, 'valor' => 5900.00, 'descricao' => 'Side by Side com gelo na porta'],
        ['nome' => 'Fogão', 'quantidade' => 5, 'valor' => 950.00, 'descricao' => 'Painel automático e forno elétrico'],
        ['nome' => 'Microondas', 'quantidade' => 1, 'valor' => 1520.00, 'descricao' => 'Manda SMS quando termina de esquentar'],
      ]);
    }
}
