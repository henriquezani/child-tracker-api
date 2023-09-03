<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StateSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        DB::table('states')->insert([
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'AC', 'name' => 'Acre', 'ibge' => 12 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'AL', 'name' => 'Alagoas', 'ibge' => 27 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'AM', 'name' => 'Amazonas', 'ibge' => 13 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'AP', 'name' => 'Amapá', 'ibge' => 16 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'BA', 'name' => 'Bahia', 'ibge' => 29 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'CE', 'name' => 'Ceará', 'ibge' => 23 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'DF', 'name' => 'Distrito Federal', 'ibge' => 53 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'ES', 'name' => 'Espírito Santo', 'ibge' => 32 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'GO', 'name' => 'Goiás', 'ibge' => 52 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'MA', 'name' => 'Maranhão', 'ibge' => 21 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'MG', 'name' => 'Minas Gerais', 'ibge' => 31 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'MS', 'name' => 'Mato Grosso do Sul', 'ibge' => 50 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'MT', 'name' => 'Mato Grosso', 'ibge' => 51 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'PA', 'name' => 'Pará', 'ibge' => 15 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'PB', 'name' => 'Paraíba', 'ibge' => 25 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'PE', 'name' => 'Pernambuco', 'ibge' => 26 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'PI', 'name' => 'Piauí', 'ibge' => 22 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'PR', 'name' => 'Paraná', 'ibge' => 41 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'RJ', 'name' => 'Rio de Janeiro', 'ibge' => 33 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'RN', 'name' => 'Rio Grande do Norte', 'ibge' => 24 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'RO', 'name' => 'Rondônia', 'ibge' => 11 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'RR', 'name' => 'Roraima', 'ibge' => 14 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'RS', 'name' => 'Rio Grande do Sul', 'ibge' => 43 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'SC', 'name' => 'Santa Catarina', 'ibge' => 42 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'SE', 'name' => 'Sergipe', 'ibge' => 28 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'SP', 'name' => 'São Paulo', 'ibge' => 35 ],
            [ 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()), 'uf' => 'TO', 'name' => 'Tocantins', 'ibge' => 17 ],
        ]);
    }
}
