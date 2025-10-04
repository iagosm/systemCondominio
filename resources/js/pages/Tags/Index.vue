<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { can } from '@/lib/can';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Tag',
    href: '/tags',
  },
];

defineProps({
  tags: Array
});

function deleteTag(id) {
  if(confirm("Você tem certeza que deseja excluir?")) {
    router.delete(route("tags.destroy", id));
  }
}
</script>

<template>

  <Head title="Tag" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link 
        v-if="can('tags.create')"
        :href="route('tags.create')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
        Adicionar
      </Link>
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mt-3">
        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nome</th>
            <th scope="col" class="px-6 py-3">Criado em</th>
            <th scope="col" class="px-6 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tag in tags" :key="tag.id" class="bg-white odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800">
            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{tag.id}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{tag.name}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{tag.created_at}}</td>
            <td class="flex gap-2 px-6 py-2">
              <Link
              v-if="can('tags.view')"
                :href="route('tags.show', tag.id)"
                class="mr-1 cursor-pointer rounded bg-gray-600 px-3 py-2 text-xs font-medium text-white hover:bg-gray-700">
                Visualizar
              </Link>
              <Link
                v-if="can('tags.edit')"
                :href="route('tags.edit', tag.id)"
                class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
                Editar
              </Link>
              <button
                v-if="can('tags.delete')"
                @click="deleteTag(tag.id)"
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
