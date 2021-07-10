<template>
    <authenticated-layout>
        <div class="h-full font-light p-6 rounded-lg bg-white">
            This is the list of products.
        </div>
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";

export default {
    data() {
        return {
            showFullSidebar: false,
        }
    },
    props: {
        title: String,
    },
    components: {
        AuthenticatedLayout,
    }
}
</script>
