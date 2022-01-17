<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Cliente::create( [ 
        'apellidos'=> 'Vargas Suarez',
        'ci' => 10903412,
    ]);

    Cliente::create( [ 
        'apellidos'=> 'Bolivar',
        'ci' => 11145678,
    ]);
    }
}
