<template>
    <authenticated-layout>
        <div class="h-full w-full p-6 rounded-lg bg-white">
            <p>You are not authorised to view this page.</p>
        </div>
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { ref } from 'vue'
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue';

export default {
    data() {
        return {
            showFullSidebar: false,
        }
    },
    setup() {
        const plan = ref('startup');

        return plan;
    },
    props: {
        title: String,
    },
    components: {
        AuthenticatedLayout,
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
    }
}
</script>
