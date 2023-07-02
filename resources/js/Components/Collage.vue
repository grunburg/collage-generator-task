<script setup>
defineProps({
    collage: {
        type: Object,
        default: () => ({}),
    },
})
</script>

<template>
    <div
        class="relative aspect-[3/2] overflow-hidden bg-zinc-100 rounded-md transition-all border border-zinc-100"
        role="button"
    >
<!--        <img draggable="false" class="object-cover w-full h-full" :src="poster?.path" :alt="poster?.name">-->
<!--        <div-->
<!--            v-if="isSelected"-->
<!--            class="m-2 absolute top-0 right-0 flex items-center justify-center w-6 h-6 ring ring-blue-600/30-->
<!--            bg-blue-600 rounded-full"-->
<!--        >-->
<!--            <CheckIcon class="w-4 h-4 text-white" />-->
<!--        </div>-->
    </div>
</template>