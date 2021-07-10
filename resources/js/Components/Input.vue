<template>
    <input class="px-0 text-sm filter-none border-0 border-b border-gray-400 focus:border-gray-400 focus:ring-0 focus:outline-none" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

