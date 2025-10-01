<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Usuários e roles
            "users.view", "users.create", "users.edit", "users.delete",
            "roles.view", "roles.create", "roles.edit", "roles.delete",

            // Moradores e unidades
            "residents.view", "residents.create", "residents.edit", "residents.delete",
            "units.view", "units.create", "units.edit", "units.delete",

            // Veículos e movimentações
            "vehicles.view", "vehicles.create", "vehicles.edit", "vehicles.delete",
            "garage_movements.view", "garage_movements.create", "garage_movements.edit", "garage_movements.delete",

            // Reservas e espaços
            "bookings.view", "bookings.create", "bookings.edit", "bookings.delete",
            "spaces.view", "spaces.create", "spaces.edit", "spaces.delete",

            // Ocorrências e sugestões
            "incidents.view", "incidents.create", "incidents.edit", "incidents.delete",
            "suggestions.view", "suggestions.create", "suggestions.edit", "suggestions.delete",

            // Limpezas e manutenções
            "cleanings.view", "cleanings.create", "cleanings.edit", "cleanings.delete",
            "maintenances.view", "maintenances.create", "maintenances.edit", "maintenances.delete",

            // Despesas e notificações
            "expenses.view", "expenses.create", "expenses.edit", "expenses.delete",
            "notifications.view", "notifications.create", "notifications.edit", "notifications.delete",

            // Tags
            "tags.view", "tags.create", "tags.edit", "tags.delete",
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(["name" => $permission]);
        }
    }
}
