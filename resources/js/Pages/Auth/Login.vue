<template>
    <system-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <system-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" placeholder="Email address" />
        </div>

        <div class="mt-4">
            <system-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" placeholder="Password" />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <system-checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex mt-4">
            <system-button class="flex-1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Sign in
            </system-button>
        </div>
    </form>
</template>

<script>
    import SystemButton from '@/Components/Button'
    import SystemGuestLayout from "@/Layouts/Guest"
    import SystemInput from '@/Components/Input'
    import SystemCheckbox from '@/Components/Checkbox'
    import SystemLabel from '@/Components/Label'
    import SystemValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: SystemGuestLayout,

        components: {
            SystemButton,
            SystemInput,
            SystemCheckbox,
            SystemLabel,
            SystemValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
            }
        }
    }
</script>
