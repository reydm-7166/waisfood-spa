<template>

    <Head title="WaisFood"/>

    <RightSideLayout>
        <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
            <h1 class="font fw-bold">You are in index page!</h1>
        </div>
        <div id="body" class="w-100 mt-3">
            <Link href="/register" class="btn btn-primary p-1 fs-5 mx-2">Register</Link>
            <Link href="/login" class="btn btn-success p-1 fs-5 mx-2">Login</Link>
        </div>
    </RightSideLayout>


</template>

<script>
    import Layout from '../Template/Layout.vue';
    import SidebarLayout from '../Template/SidebarLayout.vue';
    import RightSideLayout from '../Template/RightSideLayout.vue';

    import { sideBar, removeWidth } from '../../sideBar';

    import Navbar from '../Template/NavigationBar.vue'
    export default {

        layout: Layout,
        components: {
            Navbar,
            SidebarLayout,
            RightSideLayout,
        },
        mounted() {
            removeWidth()
        }
    }
</script>

<style scoped>
    #body {
        min-height: 90vh;
        height: fit-content;
    }
</style>
