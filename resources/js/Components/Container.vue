<script setup>
defineProps({
    title: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <div class="w-full sm:max-w-2xl bg-white border border-zinc-200 shadow-sm rounded-lg">
        <div class="p-4 space-y-4">
            <h1 class="text-lg text-zinc-700 font-medium">{{ title }}</h1>
            <slot name="body" />
        </div>
        <div class="p-4 border-t">
            <slot name="footer" />
        </div>
    </div>
</template>