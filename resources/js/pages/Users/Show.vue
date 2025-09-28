<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Visualizar Usuário',
    href: '/users',
  },
];

const props = defineProps({
  user: Object
});

</script>

<template>

  <Head title="Visualizar Usuário" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('users.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <div>
        <p><strong>Nome:</strong>{{ user.name }}</p>
        <p><strong>Email:</strong>{{ user.email }}</p>
      </div>
    </div>
  </AppLayout>
</template>
