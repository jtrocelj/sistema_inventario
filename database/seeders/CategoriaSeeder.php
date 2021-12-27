<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create( [ 
            'nombre'=> 'DEPORTIVAS',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'nombre'=> 'ENDURO',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'nombre'=> 'NAKED',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'nombre'=> 'MOTOCROS',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
    }
}
