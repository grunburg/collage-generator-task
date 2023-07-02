<script setup>
import Collage from '@/Components/Collage.vue'
import Banner from '@/Components/Banner.vue'
import InfoIcon from '@/Components/Icons/InfoIcon.vue'

defineProps({
    collages: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <Banner v-if="!collages.length">
        <template #icon>
            <InfoIcon class="w-6 h-6 text-blue-700" />
        </template>
        <template #content="{ classes }">
            <p :class="classes">
                No collages found. Select some posters and generate some.
            </p>
        </template>
    </Banner>
    <div class="grid grid-cols-3 gap-2">
        <Collage v-for="collage in collages" :collage="collage" />
    </div>
</template>