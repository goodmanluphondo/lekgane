<template>
    <authenticated-layout>
        <div class="">
            This is the dashboard.
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
    components: {
        AuthenticatedLayout,
    }
}
</script>
