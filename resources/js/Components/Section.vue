<script setup>
defineProps({
    title: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <div class="flex items-center">
        <slot name="icon" />
        <h2 class="ml-1.5 text-zinc-500 text-sm">{{ title }}</h2>
    </div>
    <div class="space-x-2">
        <slot />
    </div>
</template>