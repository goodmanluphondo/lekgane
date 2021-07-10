<template>
    <authenticated-layout>
        <div class="h-full font-light p-6 rounded-lg bg-white">
            <h3 class="text-2xl font-light leading-normal mb-4">New Item</h3>

            <!--start::New Item-->
            <div>
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
                                        <input v-model="product.markup" type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" readonly>
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

export default {
    data() {
        return {
            product: this.$inertia.form({
                name: null,
                size: null,
                barcode: null,
                cost: 0,
                price: 0,
                markup: this.markup,
            }),
        }
    },
    props: {
        title: String,
    },
    components: {
        AuthenticatedLayout,
    },
    methods: {
        submit() {
            if(this.product.name && this.product.size && this.product.barcode && this.product.price && this.product.markup) {
                console.log('submitted new product');
            } else {
                console.log('uzama ukwenzani?')
            }
        }
    },
    computed: {
        markup() {
            return this.price - this.cost;
        }
    }
}
</script>
