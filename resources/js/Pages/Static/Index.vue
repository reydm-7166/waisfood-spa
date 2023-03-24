<template>

    <Head title="WaisFood"/>

    <RightSideLayout>
        <div class="bg bg-warning fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
                <h1 class="font fw-bold">You are in index page!</h1>
            </div>
            <div id="body" class="w-100 mt-3">
                <Link href="/register" class="btn btn-primary p-1 fs-5 mx-2 font">Register</Link>
                <Link href="/login" class="btn btn-success p-1 fs-5 mx-2 font">Login</Link>
            </div>
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
    .content {
        transition: all 0.5s ease;
        width: 95%;
    }
    #right-content {
        height: fit-content;
        min-height: 100vh;
    }

</style>
