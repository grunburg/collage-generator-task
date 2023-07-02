<script setup>
import CheckIcon from '@/Components/Icons/CheckIcon.vue'

const props = defineProps({
    poster: {
        type: Object,
        default: () => ({}),
    },
    isSelected: {
        type: Boolean,
        default: false,
    },
})

const emit = defineEmits(['on-select'])

const onSelect = () => {
    emit('on-select', props.poster?.id)
}
</script>

<template>
    <div
        class="relative aspect-[2/3] overflow-hidden bg-zinc-100 rounded-md transition-all border border-zinc-300"
        :class="{ 'scale-90 ring-4 ring-blue-600/30 border-blue-600': isSelected }"
        role="button"
        @click="onSelect()"
    >
        <img draggable="false" class="object-cover w-full h-full" :src="poster?.path" :alt="poster?.name">
        <div
            v-if="isSelected"
            class="m-2 absolute top-0 right-0 flex items-center justify-center w-6 h-6 ring ring-blue-600/30
            bg-blue-600 rounded-full"
        >
            <CheckIcon class="w-4 h-4 text-white" />
        </div>
    </div>
</template>