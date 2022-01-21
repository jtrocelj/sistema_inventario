<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create( [ 
            'nombre'=> 'CBR 500',
            'costo'=> 40000,
            'precio'=> 50000,
            'barcode'=> '10',
            'stock'=> 250,
            'alerts'=> 10,
            'categoria_id'=> 1,
            'image'=> null
        ]);

        Producto::create( [ 
            'nombre'=> 'MOTO ENDURO 2T',
            'costo'=> 20000,
            'precio'=> 30000,
            'barcode'=> '11',
            'stock'=> 500,
            'alerts'=> 10,
            'categoria_id'=> 2,
            'image'=>null
        ]);
        Producto::create( [ 
            'nombre'=> 'NAKED 1000',
            'costo'=> 15000,
            'precio'=> 20000,
            'barcode'=> '12',
            'stock'=> 400,
            'alerts'=> 10,
            'categoria_id'=> 3,
            'image'=>null
        ]);
        Producto::create( [ 
            'nombre'=> 'YAMAHA 250',
            'costo'=> 45000,
            'precio'=> 55000,
            'barcode'=> '13',
            'stock'=> 450,
            'alerts'=> 10,
            'categoria_id'=> 4,
            'image'=>null
        ]);
    }
}
