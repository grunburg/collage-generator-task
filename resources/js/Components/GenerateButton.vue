<script setup>
import { computed } from 'vue'
import LoadingIcon from '@/Components/Icons/LoadingIcon.vue'

const props = defineProps({
    state: {
        type: String,
        required: true,
        validator: (value) => ['default', 'loading'].includes(value),
    },
    disabled: {
        type: Boolean,
        default: false,
    }
})

const emit = defineEmits(['on-generate'])

const onGenerate = () => {
    if (!isDisabled.value) {
        emit('on-generate')
    }
}

const isDisabled = computed(() => props.disabled || props.state === 'loading')
</script>

<template>
    <div
        role="button"
        class="p-2.5 min-w-[6rem] text-sm text-white rounded border border-blue-600 bg-blue-600"
        :class="{ 'opacity-75 cursor-not-allowed': isDisabled }"
        @click="onGenerate"
    >
        <div class="flex items-center justify-center">
            <span v-if="state === 'default'">Generate</span>
            <LoadingIcon v-if="state === 'loading'" class="w-5 h-5 animate-spin" />
        </div>
    </div>
</template>