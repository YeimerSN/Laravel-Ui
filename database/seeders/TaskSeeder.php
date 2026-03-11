<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Task to test the app
        Task::create([
            'title' => 'Configurar servidor de correo',
            'detail' => 'Establecer los protocolos SMTP para las notificaciones del sistema.',
            'is_completed' => true,
            'priority' => 'high',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Diseñar landing page',
            'detail' => 'Crear el boceto inicial de la página de inicio en Figma.',
            'is_completed' => false,
            'priority' => 'medium',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Revisión de logs de errores',
            'detail' => 'Analizar los archivos de registro de la última semana para detectar fallos.',
            'is_completed' => false,
            'priority' => 'low',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Optimizar base de datos',
            'detail' => 'Revisar índices y consultas lentas en la tabla de transacciones.',
            'is_completed' => true,
            'priority' => 'high',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Redactar manual de usuario',
            'detail' => 'Escribir la documentación técnica para los nuevos editores del sitio.',
            'is_completed' => false,
            'priority' => 'medium',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Actualizar dependencias de Composer',
            'detail' => 'Ejecutar composer update y testear la compatibilidad con Laravel 11.',
            'is_completed' => false,
            'priority' => 'high',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Backup mensual del sistema',
            'detail' => 'Realizar respaldo de imágenes y archivos cargados en S3.',
            'is_completed' => true,
            'priority' => 'medium',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Reunión de planificación',
            'detail' => 'Definir los objetivos del próximo sprint con el equipo de desarrollo.',
            'is_completed' => false,
            'priority' => 'low',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Corregir bugs en el login',
            'detail' => 'Solucionar el problema de redirección infinita en dispositivos móviles.',
            'is_completed' => true,
            'priority' => 'high',
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Investigar nueva API de pagos',
            'detail' => 'Evaluar la documentación de Stripe para integrar pagos recurrentes.',
            'is_completed' => false,
            'priority' => 'medium',
            'user_id' => 1,
        ]);
    }
}
