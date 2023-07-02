<script setup>
const props = defineProps({
    content: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        validator: (value) => ['default', 'info'].includes(value),
        default: 'default',
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

const background = [
    { 'bg-white border-zinc-200': props.type === 'default' },
    { 'bg-blue-600 border-blue-600': props.type === 'info' },
];

const text = [
    { 'text-zinc-600': props.type === 'default' },
    { 'text-white': props.type === 'info' },
]
</script>

<template>
    <button
        class="p-2.5 text-sm rounded border"
        :class="[{ 'opacity-75 cursor-not-allowed': disabled }, ...background]"
        :disabled="disabled"
        @click="onClick"
    >
        <span class="flex items-center" :class="{ 'space-x-1': $slots?.icon }">
            <slot name="icon" :classes="[text, 'w-4 h-4']" />
            <span :class="text">{{ content }}</span>
        </span>
    </button>
</template>