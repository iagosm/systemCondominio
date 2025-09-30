<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Visualizar Permissão',
    href: '/users',
  },
];

const props = defineProps({
  role: Array,
  rolePermissions: Object
});

</script>

<template>

  <Head title="Visualizar Permissão" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('roles.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <div>
        <p><strong>Nome:</strong>{{ role.name }}</p>
        <p><strong>Permissão:</strong>
          <span
              v-for="permission in rolePermissions"
              :key="permission"
              class="mr-1 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5">
                {{ permission }}
          </span>
         </p>
      </div>
    </div>
  </AppLayout>
</template>
