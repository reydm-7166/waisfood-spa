<template>
    <Head title="Register"/>
    <RightSideLayout>
        <div class="bg bg-secondary fs-4 p-3 d-inline-block align-top content d-flex justify-content-center" id="right-content">
            <div id="register-container" class="">
                <div class="d-flex justify-content-center w-100">
                    <form action=""
                        @submit.prevent="submit"
                        class="d-flex justify-content-center flex-column p-3 align-items-start w-50"
                    >
                        <div class="mb-1 w-100">
                            <label for="firstname" class="form-label font-2 fs-6">First Name</label>
                            <input type="text" name="firstname" class="form-control font-2 fw-bold" v-model="form.firstname" id="firstname" placeholder="ex. John">
                        </div>
                        <div class="mb-1 w-100">
                            <label for="lastname" class="form-label font-2 fs-6">Last Name</label>
                            <input type="text" name="lastname" class="form-control font-2 fw-bold" v-model="form.lastname" id="lastname" placeholder="ex. Doe">
                        </div>
                        <div class="mb-1 w-50">
                            <label for="age" class="form-label font-2 fs-6">Age</label>
                            <input type="number" name="age" class="form-control font-2 fw-bold" v-model="form.age" id="age" placeholder="Age" min="0" max="65">
                        </div>
                        <div class="mb-1 w-100">
                            <label for="email" class="form-label font-2 fs-6">Email Address</label>
                            <input type="email" name="email" class="form-control font-2 fw-bold" v-model="form.email" id="email" placeholder="waisfood@gmail.com">
                        </div>
                        <div class="mb-3 w-100">
                            <label for="password" class="form-label font-2 fs-6">Password</label>
                            <input type="password" name="password" class="form-control font-2 fw-bold" v-model="form.password" id="password" placeholder="8 characters min.">
                        </div>
                        <label for="username" class="form-label font-2 fs-6">Username</label>
                        <div class="input-group mb-3 w-100">
                            <span class="input-group-text font-2" id="basic-addon1">@</span>
                            <input type="text" name="username" class="form-control font-2 fw-bold" v-model="form.username" placeholder="sample123" aria-label="Username" id="username" aria-describedby="basic-addon1">
                        </div>

                        <div class="mb-1 w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-main shadow font px-3" :disabled="form.processing">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </RightSideLayout>

</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'
    import RightSideLayout from '../Template/RightSideLayout.vue';

    defineProps({
        errors: Object,
    })
    const form = useForm({
        firstname: '',
        lastname: '',
        username: '',
        age: '',
        email: '',
        password: '',
    })

    const submit = () => {
        form.post('register/store')
        form.reset()
        form.clearErrors()
    }
</script>

<style scoped>
    .content {
        transition: all 0.5s ease;
        width: 100%;
    }
    #right-content {
        height: fit-content;
        min-height: 100vh;
    }
    #register-container {
        width: 50%;
    }
    .btn-main {
        background-color: #9ACD32;
        border-radius: .2rem;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        color: black;
        padding: 5px;
        margin: 0 5px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

</style>
