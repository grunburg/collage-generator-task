<script setup>
import Collage from '@/Components/Collage.vue'

const a = [1, 2, 3];

defineProps({
    collages: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <div class="grid grid-cols-3 gap-2">
        <Collage v-for="collage in a" :collage="collage" />
    </div>
</template>