import { readonly, ref } from 'vue'

const ids = ref(new Set());

const toggle = (id) => {
    ids.value.has(id) ? ids.value.delete(id) : ids.value.add(id)
}

const reset = () => {
    ids.value = new Set()
}

const isSelected = (id) => ids.value.has(id)

export function useState() {
    return { ids: readonly(ids), isSelected, toggle, reset }
}