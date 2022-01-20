<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
       
        $users = new User;
        
        $users->name = 'Administrador';
        $users->email = 'admin@admin.com';
        $users->password = bcrypt('12345678');
        $users->rol = 'admin';
        $users->telefono = '73053480';
        $users->status = 'ACTIVO';
       
        $users->assignRole('admin');
        $users->save();

      


        $users = new User;
        $users->name = 'Jorge Trocel Justiniano';
        $users->email = 'andrestrocel44@gmail.com';
        $users->password = bcrypt('12345678');
        $users->rol = 'empleado';
        $users->telefono = '71123451';
        $users->status = 'ACTIVO';

        $users->assignRole('empleado');
        $users->save();

        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        

    }
}
