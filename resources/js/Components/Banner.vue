<template>
    <div class="p-1.5 w-full rounded-md bg-blue-100 border border-blue-400">
        <div class="flex items-center space-x-1.5">
            <slot name="icon" />
            <slot name="content" :classes="'text-sm text-blue-800'" />
        </div>
    </div>
</template>