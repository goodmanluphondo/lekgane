<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div>
            <inertia-link href="/">
                <logo />
            </inertia-link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden">
            <slot />
        </div>
    </div>
</template>

<script>
import Logo from '@/Components/Logo'

export default {
    components: { Logo }
}
</script>
