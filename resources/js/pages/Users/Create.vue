<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Adicionar Usuários',
    href: '/users',
  },
];

defineProps({
  "roles": Array
})

const form = useForm({
  "name": "",
  "email": "",
  "phone": "",
  "password": "",
  "roles": [],
});
</script>

<template>

  <Head title="Adicionar Usuários" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="overflow-x-auto p-3">
      <Link :href="route('users.index')"
        class="cursor-pointer rounded bg-blue-600 px-3 py-2 text-xs font-medium text-white hover:bg-blue-700">
      Voltar
      </Link>
      <form @submit.prevent="form.post(route('users.store'))" class="space-y-6 mt-4 max-w-md mx-auto">
        <div class="grid gap-2">
          <label for="name" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Nome:
          </label>
          <input id="name" name="name" v-model="form.name"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite seu nome" />
          <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
        </div>
        <div class="grid gap-2">
          <label for="email" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            E-mail:
          </label>
          <input id="email" name="email" v-model="form.email"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite seu e-mail" />
          <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
        </div>
        <div class="grid gap-2">
          <label for="email" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Telefone:
          </label>
          <input id="email" name="phone" v-model="form.phone"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite seu e-mail" />
          <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.phone }}</p>
        </div>
        <div class="grid gap-2">
          <label for="name" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Senha:
          </label>
          <input type="password" id="senha" name="email" v-model="form.password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-base shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Digite sua senha" />
          <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
        </div>
        <div class="grid gap-2">
          <label for="name" class="text-sm leading-none font-medium select-none peer-disabled:cursor-not-allowed">
            Permissões:
          </label>
          <label v-for="role in roles"
            class="flex items-center space-x-2">
            <input :value="role" v-model="form.roles" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-2">
            <span class="text-gray-800 capitalize">{{role}}</span>
          </label>
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md">
          Criar
        </button>
      </form>
    </div>
  </AppLayout>
</template>
