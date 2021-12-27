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
            'name'=> 'DEPORTIVAS',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'name'=> 'ENDURO',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'name'=> 'NAKED',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
        Categoria::create( [ 
            'name'=> 'MOTOCROS',
            'image' => 'https://dummyimage.com/200x150/33b4bd/fff'
        ]);
    }
}
