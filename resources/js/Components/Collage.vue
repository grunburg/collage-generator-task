<script setup>
import DefaultButton from '@/Components/DefaultButton.vue'
import ViewIcon from '@/Components/Icons/ViewIcon.vue'

const props = defineProps({
    collage: {
        type: Object,
        default: () => ({}),
    },
})

const onView = () => {
    window.location.href = props.collage?.path
}
</script>

<template>
    <div class="group relative aspect-[3/2] overflow-hidden bg-zinc-100 rounded-md border border-zinc-300">
        <div class="absolute inset-0 flex items-center justify-center transition-all group-hover:bg-white/70">
            <DefaultButton content="View" type="info" @on-click="onView" class="opacity-0 group-hover:opacity-100">
                <template #icon="{ classes }">
                    <ViewIcon :class="classes" />
                </template>
            </DefaultButton>
        </div>
        <img
            class="object-cover w-full h-full"
            draggable="false"
            :src="collage?.path"
            :alt="collage?.path"
        >
    </div>
</template>