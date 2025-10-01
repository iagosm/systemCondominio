<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Visualizar Morador',
    href: '/residents',
  },
];

defineProps({
  resident: Object
});

</script>

<template>

  <Head title="Visualizar Usuário" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('residents.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <div>
        <p><strong>Nome:</strong>{{ resident.name }}</p>
        <p><strong>Email:</strong>{{ resident.email }}</p>
      </div>
    </div>
  </AppLayout>
</template>
