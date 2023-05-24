<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex space-x-4">
            <a :href="route('home')"
               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              Home
            </a>
            <a :href="route('main.person')"
               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              Users
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

