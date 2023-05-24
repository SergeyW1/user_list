<script setup>
import Layout from "../Shared/Layout.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
  title: String
})
</script>

<template>
  <Head :title="title"/>
  <Layout></Layout>
  <h1>{{ title }}</h1>

</template>
