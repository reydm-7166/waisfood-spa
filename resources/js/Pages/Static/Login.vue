<template>
    <Head title="Login"/>
    <RightSideLayout>
        <div class="bg fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="register-container" class="bg bg-warning w-25 rounded d-flex align-items-center flex-column m-auto mt-5">
                <form @submit.prevent="submit"
                      class="w-100 mt-3 h-25">
                    <div class="mb-4 w-75 m-auto border">
                        <label for="username" class="form-label font-2 fs-6">Username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control font-2 fw-bold border"
                            id="username"
                            v-model="form.username"
                            :class="{
                              'border border-2 border-danger': errors.username
                            }"
                            placeholder="ex. godgamer123">
                        <small class="error fs-7" v-if="errors.username">{{ errors.username }}</small>
                    </div>
                    <div class="mb-5 w-75 m-auto  border">
                        <label for="password" class="form-label font-2 fs-6">Password</label>
                        <input type="password" name="password" class="form-control font-2 fw-bold" id="password" v-model="form.password" placeholder="ex. password">
                        <small class="error fs-7" v-if="errors.password">{{ errors.password }}</small>
                    </div>
                    <div class="mb-5 w-75 m-auto text-center">
                        <button class="btn btn-secondary font shadow" type="submit" :disabled="form.processing">Login</button>
                    </div>
                </form>
                <div id="register-container" class="w-100 d-flex flex-column align-items-center">
                    <p class="font text-dark fs-6">Don't have an account yet?</p>
                    <Link href="/register" class="fs-6 text-decoration-underline text-primary">Register here</Link>
                </div>
            </div>
        </div>
    </RightSideLayout>

</template>

<script setup>
    import RightSideLayout from '../Template/RightSideLayout.vue';
    import {computed} from 'vue'
    import { useForm } from '@inertiajs/vue3'
    import { usePage } from '@inertiajs/vue3'


    const message =  computed(() => usePage().props.flash)

    defineProps({
      errors: Object,
    })

    if (message.value.auth == 'Error') {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            toast: true,
            title: 'Log in first!',
            showConfirmButton: false,
            timer: 2000
        });
    }
    if (message.value.message) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            toast: true,
            title: 'Account Created',
            showConfirmButton: false,
            timer: 2000
        });
    }

    const form = useForm({
        username: '',
        password: '',
    })

    const submit = () => {
        form.post('login/attempt')
        form.reset()
        form.clearErrors()
    }

</script>

<style scoped>
    #right-content {
        height: 100vh;
        width: 95%;
    }

    #register-container {
        min-height: 50%;
        height: fit-content;
    }
</style>
