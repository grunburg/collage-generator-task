<script setup>
import Poster from '@/Components/Poster.vue'
import { useState } from '@/Composables/state.js'

defineProps({
    posters: {
        type: Array,
        required: true,
    },
})

const { isSelected, toggle } = useState()

const onSelect = (id) => { toggle(id) }
</script>

<template>
    <div class="grid grid-cols-5 gap-2">
        <Poster v-for="poster in posters" :poster="poster" :is-selected="isSelected(poster.id)" @on-select="onSelect" />
    </div>
</template>