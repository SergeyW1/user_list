<script setup>
import Layout from "../../Shared/Layout.vue";
import {Head, Link, router} from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue";

defineProps({
  title: String,
  users: Array
})

const destroy = (id) => {
  router.delete(`person/${id}`)
}

</script>

<template>
  <Head :title="title"/>
  <Layout></Layout>
  <div class="container mx-auto">
    <header class="bg-white shadow mb-10">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
          {{ title }}
        </h1>
      </div>
    </header>
    <div class="flex items-center justify-between align-bottom">
      <Link :href="route('create.person')"
            class="w-34 mb-4 inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
        </svg>
        Add user
      </Link>
      <!-- 1 card -->
      <div class="relative bg-white py-6 px-6 rounded-3xl w-34 my-4 shadow-xl">
        <p class="text-xl font-semibold my-2">Users
          <div class="flex space-x-2 text-gray-400 text-sm mt-2">
            <!-- svg  -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <p>{{ users.meta.total }}</p>
          </div>
        </p>

        <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">

          <!-- svg  -->
          <svg class="h-6 w-6 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
               stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
          </svg>
        </div>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div v-if="users.data" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
              <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Имя
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  E-mail
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Действия</span>
                </th>
              </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="person in users.data" :key="person.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <Link
                          :href="route('show.person', person.id)"
                          class="text-sm font-medium text-gray-900 hover:text-gray-500">
                    {{ person.name }}
                  </Link>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">
                    {{ person.email }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center space-x-3">
                  <Link
                          :href="route('edit.person', person.id)"
                          class="text-blue-600 hover:text-blue-900 cursor-pointer"
                  >
                    Редактировать
                  </Link>
                  <Link
                          :href="route('delete.person', person.id)"
                          @click.prevent="destroy(person.id)"
                          class="text-red-600 hover:text-red-900 cursor-pointer"
                  >
                    Удалить
                  </Link>
                </td>
              </tr>
              </tbody>
            </table>
            <Pagination :links="users.meta.links"/>
          </div>
          <div v-else class="text-center font-bold text-xl">
            Пользователей пока нет
          </div>

        </div>
      </div>
    </div>
  </div>
</template>
