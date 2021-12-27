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
        $users = new User;
        $users->name = 'Administrator';
        $users->email = 'admin@admin.com';
        $users->password = bcrypt('12345678');
        $users->rol = 'admin';
        $users->telefono = '73053480';
        $users->status = 'ACTIVO';

        $users->save();
        $this->call(DenominacionSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);

    }
}
