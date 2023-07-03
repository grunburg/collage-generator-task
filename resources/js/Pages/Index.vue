<script setup>
import Container from '@/Components/Container.vue'
import ImageIcon from '@/Components/Icons/ImageIcon.vue'
import Section from '@/Components/Section.vue'
import BoltIcon from '@/Components/Icons/BoltIcon.vue'
import GenerateButton from '@/Components/GenerateButton.vue'
import DefaultButton from '@/Components/DefaultButton.vue'
import EraserIcon from '@/Components/Icons/EraserIcon.vue'
import PosterContainer from '@/Components/PosterContainer.vue'
import { useState } from '@/Composables/state.js'
import { computed, ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import CollageContainer from '@/Components/CollageContainer.vue'
import { useToast } from 'vue-toastification'

defineProps({
    posters: {
        type: Array,
        default: [],
    },
    collages: {
        type: Array,
        default: [],
    },
})

const { ids, reset } = useState()
const form = useForm({ posters: computed(() => Array.from(ids.value)) });
const toast = useToast()

const generateButtonState = ref('default')

const onGenerate = () => {
    generateButtonState.value = 'loading'

    form.post('/', {
        onFinish: () => {
            generateButtonState.value = 'default'
            reset()
            toast.success('A new collage was successfully created')
        },
        preserveScroll: true,
    });
};

const counter = computed(() => {
    if (!ids.value.size) {
        return ''
    }

    const plural = ids.value.size > 1 ? 'images' : 'image'

    return `${ids.value.size} ${plural} selected`
})

const onClear = () => { reset() }
</script>

<template>
    <div class="py-16 min-h-screen flex items-center justify-center bg-zinc-100">
        <Container title="Collage Generator ✨">
            <template #body>
                <Section title="Posters">
                    <template #icon>
                        <ImageIcon class="w-4 h-4 text-blue-600" />
                    </template>
                    <PosterContainer :posters="posters" />
                </Section>
                <Section title="Generated">
                    <template #icon>
                        <BoltIcon class="w-4 h-4 text-yellow-500" />
                    </template>
                    <CollageContainer :collages="collages" />
                </Section>
            </template>
            <template #footer>
                <div class="flex items-center justify-between">
                    <p class="text-xs text-zinc-500">{{ counter }}</p>
                    <div class="flex items-center  space-x-2">
                        <DefaultButton content="Clear" @on-click="onClear" :disabled="!ids.size">
                            <template #icon="{ classes }">
                                <EraserIcon :class="classes" />
                            </template>
                        </DefaultButton>
                        <GenerateButton
                            :state="generateButtonState"
                            :disabled="!ids.size"
                            @on-generate="onGenerate"
                        />
                    </div>
                </div>
            </template>
        </Container>
    </div>
</template>