<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'                  => 1,
            'name'                => 'Admin',
            'email'               => 'admin@admin.com',
            'password'            => '$2y$10$y3uGIfmDHmrm2bfaAfIGUekhGNbBc4kNZ5On5DTF99w8/p31.gDPq',
            'remember_token'      => null,
            'created_at'          => '2019-07-27 03:54:55',
            'updated_at'          => '2019-07-27 03:54:55',
            'deleted_at'          => null,
            'cum'                 => '',
            'curp'                => '',
            'nombre'              => '',
            'apellido_paterno'    => '',
            'apellido_materno'    => '',
            'sexo'                => '',
            'ocupacion'           => '',
            'telefono_particular' => '',
            'telefono_oficina'    => '',
            'domicilio'           => '',
            'colonia'             => '',
            'municipio'           => '',
            'estado'              => '',
            'provincia'           => '',
            'distrito'            => '',
            'grupo'               => '',
            'localidad'           => '',
            'seccion'             => '',
            'religion'            => '',
        ]];

        User::insert($users);
    }
}
