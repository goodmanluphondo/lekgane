<template>
    <authenticated-layout>
        <div class="">
            This is the home page / dashboard.
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
