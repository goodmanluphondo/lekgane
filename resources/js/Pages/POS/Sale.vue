<template>
    <authenticated-layout>
        <div class="h-full flex justify-between space-x-6">
            <div class="h-full flex-1 p-6 rounded-lg shadow-sm bg-white">
                <!--start::Product Search-->
                <div class="mb-8">
                    <form @submit.prevent="search">
                        <div class="w-full relative text-gray-400">
                            <input type="text" v-model="term" class="w-full p-4 border-gray-200 rounded-xl" autofocus required>
                            <button type="submit" class="absolute right-6 transform top-1/2 -translate-y-1/2 outline-none focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Product Search-->

                <!--start::Sale Items-->
                <div class="text-sm bg-white rounded-lg shadow">
                    <!--start::Section Header-->
                    <div class="h-full py-6 px-4">
                        <h3 class="text-lg text-gray-600 leading-none">Cart Items</h3>
                    </div>
                    <!--end::Section Header-->

                    <!--start::Items-->
                    <div class="border-t border-gray-300">
                        <!--start::List of Products-->
                        <dl class="text-sm text-gray-500">
                            <div class="py-3 px-4 text-sm font-normal grid grid-cols-8 gap-2">
                                <dt class="col-span-4">Item</dt>
                                <dd>Price</dd>
                                <dd>Qty</dd>
                                <dd>Subtotal</dd>
                                <dd></dd>
                            </div>
                            <div v-for="(product, index) in cart" :key="index" :class="{'bg-gray-50': index % 2 === 0, 'bg-white': index % 2 !== 0}" class="py-3 px-4 items-center grid grid-cols-8 gap-2">
                                <dt class="col-span-4 text-sm text-gray-500">
                                    {{product.name}}
                                </dt>
                                <dd class="text-sm text-gray-500">
                                    {{currency(product.price)}}
                                </dd>
                                <dd class="text-sm text-gray-500">
                                    {{product.quantity}}
                                </dd>
                                <dd class="text-sm text-gray-500">
                                    {{currency(product.quantity * product.price)}}
                                </dd>
                                <dd class="h-full flex items-center justify-center space-x-2 text-sm text-gray-500">
                                    <!-- <div @click="edit(product.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div> -->
                                    <div @click="delete(product.id)" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                        <!--end::List of Products-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Sale Items-->
            </div>
            <!--start::Sale Summary-->
            <div class="h-full w-96 p-6 rounded-lg bg-white">
                <!--start::Summary-->
                <div class="py-4 text-sm border-b border-gray-200 mb-8">
                    <div class="flex flex-col space-y-4">
                        <div class="flex justify-between">
                            <div>Subtotal</div>
                            <div>{{currency(total)}}</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Discount</div>
                            <div>{{currency(0)}}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-normal uppercase text-red-600">Total</div>
                            <div>{{currency(total)}}</div>
                        </div>
                    </div>
                </div>
                <!--end::Summary-->

                <!--start::Payment Method-->
                <div>
                    <div class="font-normal text-sm uppercase mb-4">Add Payment</div>
                    <div class="flex flex-col space-y-2 text-sm mb-8">
                        <div v-for="method in payment.methods" :key="method.name" @click="payment.selected = method" :class="{'text-gray-400 bg-gray-800': payment.selected == method}" class="cursor-pointer p-4 relative rounded-lg shadow bg-white">
                            <input type="radio" v-model="payment.selected" :value="method" class="hidden">
                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" :d="method.path" />
                                </svg>
                                <div class="flex-1">
                                    <div class="font-normal">{{method.name}}</div>
                                    <div class="font-light">{{method.info}}</div>
                                </div>
                            </div>

                            <!--start::Select Check-->
                            <div :class="{'block': payment.selected == method, 'hidden': payment.selected !== method}" class="h-6 w-6 flex items-center justify-center absolute right-4 transform top-1/2 -translate-y-1/2 rounded-full bg-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="w-full p-4 rounded-xl text-sm uppercase text-gray-200 hover:text-gray-300 bg-gray-800 hover:bg-gray-600">Complete Sale ({{currency(total)}})</button>
                    </div>
                </div>
                <!--end::Payment Method-->
            </div>
            <!--end::Sale Summary-->
        </div>
    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Button from '@/Components/Button.vue';

export default {
    data() {
        return {
            term: null,
            payment: {
                methods: [
                    {
                        name: 'Cash',
                        info: 'Take cash and return change.',
                        path: 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'
                    },
                    {
                        name: 'Card',
                        info: 'Print out merchant copy and store away.',
                        path: 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'
                    },
                    {
                        name: 'EFT',
                        info: 'This option is currently unavailable.',
                        path: 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4'
                    }
                ],
                selected: null,
            },
            products: [
                {
                    product_id: 1,
                    name: '2l Coca-Cola No Sugar No Caffeine',
                    price: 21.99,
                    markup: 4.20,
                    quantity: 2,
                },
                {
                    product_id: 11,
                    name: '500ml Coca-Cola No Sugar No Caffeine',
                    price: 10.00,
                    markup: 3.65,
                    quantity: 1,
                },
                {
                    product_id: 4,
                    name: '300ml Coca-Cola No Sugar No Caffeine',
                    price: 7.00,
                    markup: 1.10,
                    quantity: 3,
                },
            ],
            showFullSidebar: false,
        }
    },
    props: {
        cart: Object,
        title: String,
    },
    components: {
        AuthenticatedLayout,
        Button,
    },
    methods: {
        search: function() {
           axios.get('/ps?term=' + this.term).then((res) => {
               this.term = null;
               if(res.data && res.data.id) {
                   this.$inertia.post('/cart', res.data);
               }
           });
        },
        currency: function(value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat('en-ZA', {
                style: 'currency',
                currency: 'ZAR',
                minimumFractionDigits: 2
            });
            return formatter.format(value);
        }
    },
    computed: {
        total() {
            var total = 0;
            var product;

            for(product in this.cart) {
                total += this.cart[product].price * this.cart[product].quantity;
            }

            return total;
        },
    }
}
</script>
