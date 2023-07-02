<script setup>
import Poster from '@/Components/Poster.vue'
import { useState } from '@/Composables/state.js'
import Banner from '@/Components/Banner.vue'
import InfoIcon from '@/Components/Icons/InfoIcon.vue'

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
    <Banner v-if="!posters.length">
        <template #icon>
            <InfoIcon class="w-6 h-6 text-blue-700" />
        </template>
        <template #content="{ classes }">
            <p :class="classes">
                Looks like you forgot to seed the posters.
                <code class="rounded px-1 py-0.5 text-xs bg-blue-200">./vendor/bin/sail artisan db:seed</code>
            </p>
        </template>
    </Banner>
    <div class="grid grid-cols-5 gap-2">
        <Poster v-for="poster in posters" :poster="poster" :is-selected="isSelected(poster.id)" @on-select="onSelect" />
    </div>
</template>