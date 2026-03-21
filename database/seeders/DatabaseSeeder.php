<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        usuario::create ([
            'nombre' => 'Angel',
            'clave_institucional' => '12345',
            'password' => Hash::make('12345'),
        ]);

        materia::create ([
            'clave' => 'MAT101',
            'nombre' => 'Matemáticas Básicas',
        ]);

        horario::create ([
            'materia_id' => 1,
            'dia' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '10:00:00',
        ]);

        grupo::create ([
            'horario_id' => 1,
            'nombre' => 'Grupo A',
        ]);

        inscripcion::create ([
            'usuario_id' => 1,
            'grupo_id' => 1,
        ]);

        calificacion::create ([
            'inscripcion_id' => 1,
            'calificacion' => 95,
        ]);
    }
}
