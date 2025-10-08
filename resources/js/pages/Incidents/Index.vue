<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { can } from '@/lib/can';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Ocorrências',
    href: '/incidents',
  },
];

defineProps({
  incidents: Array
});

function deleteOcorrencia(id) {
  if(confirm("Você tem certeza que deseja excluir?")) {
    router.delete(route("incidents.destroy", id));
  }
}
</script>

<template>

  <Head title="Ocorrências" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link 
        v-if="can('incidents.create')"
        :href="route('incidents.create')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
        Adicionar
      </Link>
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mt-3">
        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Titulo</th>
            <th scope="col" class="px-6 py-3">Descrição</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Tags</th>
            <th scope="col" class="px-6 py-3">Criado em</th>
            <th scope="col" class="px-6 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="incident in incidents" :key="incident.id" class="bg-white odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800">
            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{incident.id}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{incident.title}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{incident.description}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{incident.status}}</td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
            <span
              v-for="tag in incident.tags"
              :key="tag.id"
              class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded">
              {{ tag.name }}
            </span>
          </td>
            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{incident.created_at}}</td>
            <td class="flex gap-2 px-6 py-2">
              <Link
              v-if="can('incidents.view')"
                :href="route('incidents.show', incident.id)"
                class="mr-1 cursor-pointer rounded bg-gray-600 px-3 py-2 text-xs font-medium text-white hover:bg-gray-700">
                Visualizar
              </Link>
              <Link
                v-if="can('incidents.edit')"
                :href="route('incidents.edit', incident.id)"
                class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
                Editar
              </Link>
              <button
                v-if="can('incidents.delete')"
                @click="deleteOcorrencia(incident.id)"
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
