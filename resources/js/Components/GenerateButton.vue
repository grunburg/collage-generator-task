<script setup>

defineProps({
    state: {
        type: String,
        required: true,
        validator(value) {
            // The value must match one of these states
            return ['default', 'loading', 'preview', 'download'].includes(value)
        }
    },
    disabled: {
        type: Boolean,
        default: false,
    }
})

const emit = defineEmits(['on-generate'])

const onGenerate = () => {
    emit('on-generate')
}
</script>

<template>
    <div
        role="button"
        class="p-2.5 min-w-[6rem] text-sm text-white rounded border border-blue-600 bg-blue-600"
        @click="onGenerate"
    >
        <div class="flex items-center justify-center">
            <span v-if="state === 'default'">Generate</span>
        </div>
    </div>
</template>