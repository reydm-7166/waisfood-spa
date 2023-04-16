<template>
    <Head title="WaisFood"/>

    <RightSideLayout>
        <div class="fs-4 p-3 bg d-inline-block align-top content" id="right-content">
            <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
                <h1 class="font fw-bold">You are in index page!</h1>
            </div>
            <div id="body" class="w-100 mt-3">
                <Link href="/register" class="btn-main fs-5 text-dark">Register</Link>
                <Link href="/login" class="btn-main fs-5 font">Login</Link>
            </div>
        </div>
    </RightSideLayout>

</template>

<script setup>
    import RightSideLayout from '../Template/RightSideLayout.vue';
</script>

<style scoped>
    .content {
        transition: all 0.5s ease;
        width: 95%;
    }
    #right-content {
        height: fit-content;
        min-height: 100vh;
    }
    .bg {
        background-color: #5A5A5A
    }
    .btn, .btn-main {
        background-color: #9ACD32;
        border-radius: .2rem;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        color: black;
        padding: 5px;
        margin: 0 5px;
    }

</style>
