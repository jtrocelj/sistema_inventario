<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create( [ 
            'name'=> 'Categorias'
        ]);
        Permission::create( [ 
            'name'=> 'Categorias_Crear'
        ]);
        Permission::create( [ 
            'name'=> 'Categorias_Editar'
        ]);
        Permission::create( [ 
            'name'=> 'Categorias_Eliminar'
        ]);Permission::create( [ 
            'name'=> 'Productos'
        ]);Permission::create( [ 
            'name'=> 'Productos_Crear'
        ]);Permission::create( [ 
            'name'=> 'Productos_Editar'
        ]);Permission::create( [ 
            'name'=> 'Productos_Eliminar'
        ]);Permission::create( [ 
            'name'=> 'Clientes'
        ]);Permission::create( [ 
            'name'=> 'Clientes_Crear'
        ]);Permission::create( [ 
            'name'=> 'Clientes_Editar'
        ]);Permission::create( [ 
            'name'=> 'Clientes_Eliminar'
        ]);Permission::create( [ 
            'name'=> 'Vender'
        ]);Permission::create( [ 
            'name'=> 'Ventas'
        ]);
        Permission::create( [ 
            'name'=> 'Rol'
        ]);
        Permission::create( [ 
            'name'=> 'Permisos'
        ]);
        Permission::create( [ 
            'name'=> 'Usuarios'
        ]);Permission::create( [ 
            'name'=> 'Reportes'
        ]);
    }
}
