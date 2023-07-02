<script setup>
defineProps({
    content: {
        type: String,
        required: true,
    },
    disabled: {
        type: Boolean,
        default: false,
    }
})

const emit = defineEmits(['on-click'])

const onClick = () => {
    emit('on-click')
}
</script>

<template>
    <button
        class="p-2.5 text-sm rounded border bg-transparent"
        :class="{ 'opacity-75 cursor-not-allowed': disabled }"
        :disabled="disabled"
        @click="onClick"
    >
        <span class="flex items-center" :class="{ 'space-x-1': $slots?.icon }">
            <slot name="icon" />
            <span class="text-zinc-600">{{ content }}</span>
        </span>
    </button>
</template>