<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Editar Ocorrências',
    href: '/residents',
  },
];

const props = defineProps({
  incident: Object,
  tags: Array
});

const form = useForm({
  title: props.incident.title,
  description: props.incident.description,
  status: props.incident.status,
  tags: props.incident.tags?.[0]?.id || '',
});
</script>

<template>

  <Head title="Editar Ocorrências" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('residents.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <form @submit.prevent="form.put(route('incidents.update', incident.id))" class="space-y-6 mt-4 max-w-md mx-auto">
        <div class="grid gap-2">
          <label for="name" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Título:
          </label>
          <input id="name" name="title" v-model="form.title"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite seu nome" />
          <p v-if="form.errors.title" class="text-red-500 text-sm mt-1">{{ form.errors.title }}</p>
        </div>
        <div class="grid gap-2">
          <label for="descricao"
            class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Descrição:
          </label>
          <textarea id="descricao" name="descricao" v-model="form.description"
            rows="4"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite a descrição..."></textarea>
          <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
        </div>
        <div class="w-full max-w-sm">
          <label for="tipo" class="block text-sm font-semibold text-gray-800 mb-2">
            Status
          </label>
          <div class="relative">
            <select id="tipo" name="type" v-model="form.status"
              class="block w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-2 pr-10 text-gray-700 shadow-md focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none sm:text-sm">
              <option value="aberta">Aberta</option>
              <option value="em_andamento">Em Andamento</option>
              <option value="resolvida">Resolvida</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <p v-if="form.errors.status" class="text-red-500 text-sm mt-1">{{ form.errors.status }}</p>
        </div>
        <div class="w-full max-w-sm">
          <label for="tipo" class="block text-sm font-semibold text-gray-800 mb-2">
            Tag
          </label>
          <div class="relative">
            <select id="tipo" name="tags" v-model="form.tags"
              class="block w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-2 pr-10 text-gray-700 shadow-md focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none sm:text-sm">
              <option
              v-for="tag in tags"
              :value="tag.id"
              :key="tag.id"
              >
              {{ tag.name }}
            </option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <p v-if="form.errors.status" class="text-red-500 text-sm mt-1">{{ form.errors.status }}</p>
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md">
          Salvar
        </button>
      </form>
    </div>
  </AppLayout>
</template>
