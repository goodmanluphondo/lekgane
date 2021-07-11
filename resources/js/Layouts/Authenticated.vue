<template>
    <div class="min-h-screen bg-gray-100">
        <!--start::Container-->
        <div class="flex relative">
            <!--start::Sidebar-->
            <div class="h-screen transform transition-width duration-500 bg-gray-800" :class="{'w-72 overflow-visible': showFullSidebar, 'w-24 overflow-hidden': !showFullSidebar}">
                <!--start::Hamburger-->
                <div @click="showFullSidebar = !showFullSidebar" class="h-24 w-full cursor-pointer flex items-center justify-center text-gray-200 shadow">
                    <svg v-if="!showFullSidebar" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <!--end::Hamburger-->

                <!--start::Navigation-->
                <div class="font-light text-gray-500">
                    <div class="h-24 w-72 flex items-center space-x-4">
                        <nav-link href="/inventory">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </nav-link>
                        <div class="flex-1">Inventory</div>
                    </div>
                    <!-- <div class="h-24 w-72 flex items-center space-x-4">
                        <nav-link href="/products">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </nav-link>
                        <div class="flex-1">Products</div>
                    </div> -->
                    <div class="h-24 w-72 flex items-center space-x-4">
                        <nav-link href="/sale">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </nav-link>
                        <div class="flex-1">New Sale</div>
                    </div>
                    <div class="h-24 w-72 flex items-center space-x-4">
                        <nav-link href="/history">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </nav-link>
                        <div class="flex-1">Sales History</div>
                    </div>
                    <div class="h-24 w-72 flex items-center space-x-4">
                        <nav-link href="/customers">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </nav-link>
                        <div class="flex-1">Customers</div>
                    </div>
                </div>
                <!--end::Navigation-->
            </div>
            <!--end::Sidebar-->

            <!--start::Canvas-->
            <div class="h-screen w-full flex flex-col overflow-y-scroll">
                <div class="h-24 w-full flex items-center justify-between space-x-6 shadow-sm bg-white">
                    <div>
                        <inertia-link href="/"><logo /></inertia-link>
                    </div>
                    <div class="flex-1">
                        <span class="text-2xl font-light text-gray-400">
                            {{this.$page.props.title ? this.$page.props.title : 'Point of Sale'}}
                        </span>
                    </div>
                    <div class="px-6 flex space-x-4">
                        <div class="font-light uppercase">{{this.$page.props.auth.user.name}}</div>
                        <inertia-link :href="route('logout')" method="post" as="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </inertia-link>
                    </div>
                </div>

                <!--start::Main Content-->
                <main class="flex-1 p-6 font-light">
                    <slot/>
                </main>
                <!--end::Main Content-->
            </div>
            <!--end::Canvas-->
        </div>
        <!--end::Container-->
    </div>
</template>

<script>
import Logo from "@/Components/Logo.vue";
import NavLink from "@/Components/NavLink.vue";

export default {
    data() {
        return {
            showFullSidebar: false,
        }
    },
    components: {
        Logo,
        NavLink,
    }
}
</script>
