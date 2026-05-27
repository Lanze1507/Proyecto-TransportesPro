<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Piloto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserVinculadoSeeder extends Seeder
{
    /**
     * Crea cuentas de login para TODOS los clientes y pilotos
     * que aún no tienen usuario en el sistema.
     *
     * Contraseña para todos: 12345678
     */
    public function run(): void
    {
        $password = Hash::make('12345678');

        $creados_clientes  = 0;
        $saltados_clientes = 0;
        $creados_pilotos   = 0;
        $saltados_pilotos  = 0;

        // ══════════════════════════════════════════
        //  CLIENTES — todos los registros
        // ══════════════════════════════════════════
        $this->command->info('⏳ Procesando clientes...');

        // Traemos todos en chunks de 100 para no saturar la memoria
        Cliente::chunk(100, function ($clientes) use (
            $password, &$creados_clientes, &$saltados_clientes
        ) {
            foreach ($clientes as $cliente) {

                // Si el email ya existe en users → saltar
                if (User::where('email', $cliente->email)->exists()) {
                    $saltados_clientes++;
                    continue;
                }

                User::create([
                    'name'     => $cliente->nombre,
                    'email'    => $cliente->email,
                    'password' => $password,
                    'role'     => 'cliente',
                ]);

                $creados_clientes++;
            }
        });

        // ══════════════════════════════════════════
        //  PILOTOS — todos los que no tienen user_id
        // ══════════════════════════════════════════
        $this->command->info('⏳ Procesando pilotos...');

        Piloto::whereNull('user_id')->chunk(100, function ($pilotos) use (
            $password, &$creados_pilotos, &$saltados_pilotos
        ) {
            foreach ($pilotos as $piloto) {

                // Generar email limpio desde el nombre
                $emailBase = $this->generarEmail($piloto->nombre, $piloto->id);

                // Garantizar unicidad — si colisiona agregar el id
                $email = $emailBase;
                if (User::where('email', $email)->exists()) {
                    $email = str_replace('@', $piloto->id . '@', $emailBase);
                }

                // Si aún colisiona (caso extremo) saltar
                if (User::where('email', $email)->exists()) {
                    $saltados_pilotos++;
                    continue;
                }

                $user = User::create([
                    'name'     => $piloto->nombre,
                    'email'    => $email,
                    'password' => $password,
                    'role'     => 'piloto',
                ]);

                // Vincular el piloto con su usuario
                $piloto->update(['user_id' => $user->id]);

                $creados_pilotos++;
            }
        });

        // ══════════════════════════════════════════
        //  RESUMEN FINAL EN CONSOLA
        // ══════════════════════════════════════════
        $this->command->info('');
        $this->command->info('✅ Proceso completado');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info("🔑 Contraseña de todos los usuarios: 12345678");
        $this->command->info('');
        $this->command->info("👤 Clientes creados : {$creados_clientes}");
        $this->command->info("   Clientes saltados (email duplicado): {$saltados_clientes}");
        $this->command->info('');
        $this->command->info("🧑‍✈️ Pilotos creados  : {$creados_pilotos}");
        $this->command->info("   Pilotos saltados (email duplicado): {$saltados_pilotos}");
        $this->command->info('');
        $this->command->info('📋 Ejemplos de acceso:');
        $this->command->info('');

        // Mostrar 5 clientes de ejemplo
        $this->command->info('   CLIENTES (5 ejemplos):');
        User::where('role', 'cliente')->take(5)->each(function ($u) {
            $this->command->line("   → {$u->email}  /  12345678");
        });

        $this->command->info('');

        // Mostrar todos los pilotos creados
        $this->command->info('   PILOTOS:');
        User::where('role', 'piloto')->each(function ($u) {
            $this->command->line("   → {$u->email}  /  12345678");
        });

        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('');
    }

    /**
     * Genera un email limpio a partir del nombre del piloto.
     * Remueve tildes, espacios y caracteres especiales.
     */
    private function generarEmail(string $nombre, int $id): string
    {
        $mapa = [
            'á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u',
            'Á'=>'a','É'=>'e','Í'=>'i','Ó'=>'o','Ú'=>'u',
            'ñ'=>'n','Ñ'=>'n','ü'=>'u','Ü'=>'u',
            ' '=>'.',
        ];

        $limpio = strtolower(strtr($nombre, $mapa));

        // Remover cualquier caracter que no sea letra, número o punto
        $limpio = preg_replace('/[^a-z0-9.]/', '', $limpio);

        // Evitar puntos dobles o al inicio/fin
        $limpio = trim(preg_replace('/\.+/', '.', $limpio), '.');

        return $limpio . '@transpro.gt';
    }
}