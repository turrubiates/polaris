<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                  => 1,
                'name'                => 'Admin',
                'email'               => 'admin@admin.com',
                'password'            => '$2y$10$u/f50TtUJj4ntSZPAhEXoemI9i1SxU7w11v/0pTecHC0720mcQThO',
                'remember_token'      => null,
                'cum'                 => '',
                'apellido_materno'    => '',
                'curp'                => '',
                'apellido_paterno'    => '',
                'sexo'                => '',
                'ocupacion'           => '',
                'telefono_particular' => '',
                'telefono_oficina'    => '',
                'domicilio'           => '',
                'colonia'             => '',
                'municipio'           => '',
                'estado'              => '',
                'religion'            => '',
                'provincia'           => '',
                'distrito'            => '',
                'grupo'               => '',
                'localidad'           => '',
                'seccion'             => '',
                'cargo'               => '',
            ],
        ];

        User::insert($users);
    }
}
