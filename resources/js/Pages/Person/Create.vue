<script setup>
import {Link, router, useForm} from "@inertiajs/vue3";

defineProps({
  errors: Object
})

const form = useForm({
  name: '',
  email: '',
  password: ''
})

const register = () => {
  router.post('/person', form)
}
</script>

<template>
  <form
          @submit.prevent="register"
          class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:500px">
      <div class="md:flex w-full">
        <div class="w-full  py-10 px-5 md:px-10">
          <div class="text-center mb-10">
            <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
            <p>Enter your information to register</p>
          </div>
          <div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-5">
                <label for="" class="text-xs font-semibold px-1">Name</label>
                <div class="flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                  <input type="text"
                         v-model="form.name"
                         class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                         placeholder="Name">
                </div>
                <div v-if="errors.name" class="text-red-500 mt-2">{{ errors.name }}</div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-5">
                <label for="" class="text-xs font-semibold px-1">Email</label>
                <div class="flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                  <input type="email"
                         v-model="form.email"
                         class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                         placeholder="Email">
                </div>
                <div v-if="errors.email" class="text-red-500 mt-2">{{ errors.email }}</div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-12">
                <label for="" class="text-xs font-semibold px-1">Password</label>
                <div class="flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                    <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                  <input type="password"
                         v-model="form.password"
                         class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                         placeholder="************">
                </div>
                <div v-if="errors.password" class="text-red-500 mt-2">{{ errors.password }}</div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-5">
                <button
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                  Register
                </button>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-5">
                <Link
                        :href="route('main.person')"
                >
                  <button
                          class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                    Cancel
                  </button>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>
