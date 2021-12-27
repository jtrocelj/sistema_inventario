<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Denominacion;

class DenominacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denominacion::create( [ 
            'tipo'=> 'BILLETE',
            'valor'=> 10
        ]);
        Denominacion::create( [ 
            'tipo'=> 'BILLETE',
            'valor'=> 20
        ]);
        Denominacion::create( [ 
            'tipo'=> 'BILLETE',
            'valor'=> 50
        ]);
        Denominacion::create( [ 
            'tipo'=> 'BILLETE',
            'valor'=> 100
        ]);
        Denominacion::create( [ 
            'tipo'=> 'BILLETE',
            'valor'=> 200
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 0.10
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 0.20
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 0.50
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 1
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 2
        ]);
        Denominacion::create( [ 
            'tipo'=> 'MONEDA',
            'valor'=> 5
        ]);
        Denominacion::create( [ 
            'tipo'=> 'OTRO',
            'valor'=> 0
        ]);
        
    }
}
