<template>
    <authenticated-layout>
        <div class="h-full font-light p-6 rounded-lg text-gray-500 bg-white">
            <div class="flex items-center mb-4">
                <div class="flex-1">
                    <div class="flex-1">
                        <h3 class="text-2xl font-light leading-normal">New Item</h3>
                    </div>
                </div>
                <div class="flex-1 flex items-center justify-end">
                    <inertia-link href="/inventory" as="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </inertia-link>
                </div>
            </div>

            <div>
                <ValidationErrors />
            </div>

            <!--start::New Item-->
            <div class="">
                <form @submit.prevent="submit">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Barcode
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.barcode" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Scan product barcode" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Category
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <select v-model="product.category_id" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Scan product barcode">
                                            <option value selected>Select Category</option>
                                            <option v-for="(category, index) in categories" :key="index" :value="category.id" v-html="category.name"></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Name
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.name" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="e.g. Coca-Cola No Sugar No Caffeine">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Size
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.size" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="e.g. 2L, 20s, 10kg">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Cost Price
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.cost" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="How much was the product bought for?">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Selling Price
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.price" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="How much will the product be sold for?">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Markup
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.markup" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Quantity
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input v-model="product.quantity" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::New Item-->
        </div>
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue"

export default {
    data() {
        return {
            errors: [],
            product: this.$inertia.form({
                name: null,
                size: null,
                barcode: null,
                category_id: this.categories[0].id ? this.categories[0].id : 0,
                cost: 0,
                price: 0,
                markup: 0,
                quantity: 0,
            }),
        }
    },
    created() {
        console.log(this.$page.props.flash);
    },
    props: {
        title: String,
        categories: Object,
    },
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    methods: {
        submit() {
            if(this.product.name && this.product.size && this.product.barcode && this.product.price && this.product.markup) {
                this.product.post('/inventory', {
                    onSuccess: () => this.product.reset()
                });
            } else {
                console.log('something is not right.');
            }
        }
    },
    computed: {
        markup() {
            return 7;
        }
    }
}
</script>
