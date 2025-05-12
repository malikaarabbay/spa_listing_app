<template>
  <div v-if="links && links.length" class="flex gap-1">
    <component
        v-for="(link, index) in links"
        :key="index"
        :is="link.url ? Link : 'span'"
        :href="link.url"
        class="py-2 px-4 rounded-md"
        :class="{
        'bg-indigo-500 dark:bg-indigo-800 text-white': link.active,
        'text-gray-500 cursor-not-allowed': !link.url,
      }"
        v-html="link.label"
    />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: Array
})
</script>