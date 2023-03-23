<template>

    <Head title="WaisFood"/>

    <RightSideLayout>
        <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
            <h1 class="font fw-bold">You are in index page!</h1>
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
</style>
