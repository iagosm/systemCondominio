<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Visualizar Morador',
    href: '/incidents',
  },
];

defineProps({
  incident: Object
});

</script>

<template>

  <Head title="Visualizar Ocorrência" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('incidents.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <div>
        <p><strong>Titulo:</strong>{{ incident.title }}</p>
        <p><strong>Descrição:</strong>{{ incident.description }}</p>
        <p><strong>Tags:</strong>
          <span v-for="tag in incident.tags" :key="tag.id" class="px-2 py-1 bg-gray-200 rounded-full mr-1">
            {{ tag.name }}
          </span>
        </p>
      </div>
    </div>
  </AppLayout>
</template>
