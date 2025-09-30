<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Permissões',
    href: '/roles',
  },
];

defineProps({
  roles: Array,
});

function deletePermissao(id) {
  if(confirm("Você tem certeza que deseja excluir?")) {
    router.delete(route("roles.destroy", id));
  }
}
</script>

<template>

  <Head title="Permissões" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link 
        :href="route('roles.create')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
        Adicionar
      </Link>
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mt-3">
        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nome</th>
            <th scope="col" class="px-6 py-3">Permissões</th>
            <th scope="col" class="px-6 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in roles" :key="role.id" class="bg-white odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800">
            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{role.id}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{role.name}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
              <span
                v-for="permission in role.permissions"
                :key="permission.id"
                class="mr-1 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5">
                  {{ permission.name }}
                </span>
            </td>
            <td class="flex gap-2 px-6 py-2">
              <Link
                :href="route('roles.show', role.id)"
                class="mr-1 cursor-pointer rounded bg-gray-600 px-3 py-2 text-xs font-medium text-white hover:bg-gray-700">
                Visualizar
              </Link>
              <Link
                :href="route('roles.edit', role.id)"
                class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
                Editar
              </Link>
              <button
                @click="deletePermissao(role.id)"
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
