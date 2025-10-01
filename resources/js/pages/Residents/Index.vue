<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { can } from '@/lib/can';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Usuários',
    href: '/residents',
  },
];

defineProps({
  residents: Array
});

function deleteresident(id) {
  if(confirm("Você tem certeza que deseja excluir?")) {
    router.delete(route("residents.destroy", id));
  }
}
</script>

<template>

  <Head title="Usuários" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link 
        v-if="can('residents.create')"
        :href="route('residents.create')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
        Adicionar
      </Link>
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mt-3">
        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nome</th>
            <th scope="col" class="px-6 py-3">E-mail</th>
            <th scope="col" class="px-6 py-3">Telefone</th>
            <th scope="col" class="px-6 py-3">Tipo</th>
            <th scope="col" class="px-6 py-3">Permissões</th>
            <th scope="col" class="px-6 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="resident in residents" :key="resident.id" class="bg-white odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800">
            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{resident.id}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{resident.name}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{resident.email}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{resident.phone}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{resident.type}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
              <span
                v-for="roles in resident.roles"
                :key="roles.name"
                class="mr-1 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5">
                  {{ roles }}
                </span>
            </td>
            <td class="flex gap-2 px-6 py-2">
              <Link
              v-if="can('residents.view')"
                :href="route('residents.show', resident.id)"
                class="mr-1 cursor-pointer rounded bg-gray-600 px-3 py-2 text-xs font-medium text-white hover:bg-gray-700">
                Visualizar
              </Link>
              <Link
                v-if="can('residents.edit')"
                :href="route('residents.edit', resident.id)"
                class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
                Editar
              </Link>
              <button
                v-if="can('residents.delete')"
                @click="deleteresident(resident.id)"
                class="cursor-pointer rounded bg-red-600 px-3 py-2 text-xs font-medium text-white hover:bg-red-700">
                Deletar
              </button>
            </td>
          </tr>
          <!-- Repita as linhas <tr> para outros registros -->
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
