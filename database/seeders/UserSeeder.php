<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Resident;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Pegar todas as permissões do banco para a role Admin
        $allPermissions = Permission::pluck('name')->toArray();

        // 2️⃣ Criar roles
        $roles = [
            'Admin' => $allPermissions,
            'Sindico' => ['users.view','roles.view'],
            'Morador' => ['users.view'],
            'Usuario' => []
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // 3️⃣ Criar usuários com senha padrão "12345678"
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@condominio.com', 'role' => 'Admin', 'tipo_resident' => 'proprietario'],
            ['name' => 'Sindico User', 'email' => 'sindico@condominio.com', 'role' => 'Sindico', 'tipo_resident' => 'proprietario'],
            ['name' => 'Morador User', 'email' => 'morador@condominio.com', 'role' => 'Morador', 'tipo_resident' => 'inquilino'],
            ['name' => 'Usuario User', 'email' => 'usuario@condominio.com', 'role' => 'Usuario', 'tipo_resident' => 'visitante'],
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('12345678')
                ]
            );

            $user->assignRole($userData['role']);

            // Criar registro de Resident vinculado ao usuário, se não existir
            Resident::firstOrCreate(
                ['user_id' => $user->id],
                ['type' => $userData['tipo_resident']]
            );
        }
    }
}