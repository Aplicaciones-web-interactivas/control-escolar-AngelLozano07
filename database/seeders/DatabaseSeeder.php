<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\materia;
use App\Models\horario;
use App\Models\grupo;
use App\Models\inscripcion;
use App\Models\calificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create ([
            'nombre' => 'Admin',
            'clave_institucional' => '2345',
            'password' => Hash::make('Admin123'),
            'rol' => 'admin',
        ]);

        User::create ([
            'nombre' => 'Angel',
            'clave_institucional' => '12345',
            'password' => Hash::make('12345'),
            'rol' => 'alumno',
        ]);

        materia::create ([
            'clave' => 'MAT101',
            'nombre' => 'Matemáticas Básicas',
        ]);

        horario::create ([
            'materia_id' => 'MAT101',
            'usuario_id' => '12345',
            'dia' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '10:00:00',
        ]);

        grupo::create ([
            'horario_id' => 1,
            'nombre' => 'Grupo A',
        ]);

        inscripcion::create ([
            'usuario_id' => '12345',
            'grupo_id' => 1,
        ]);
        

        calificacion::create ([
            'usuario_id' => '12345',
            'grupo_id' => 1,
            'calificacion' => 95.5,
        ]);
        
    }
}
