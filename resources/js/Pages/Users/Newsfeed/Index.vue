<template>

    <Head title="News Feed"/>

    <RightSideLayout>
        <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
            <h1 class="font fw-bold">You are in newsfeed page!</h1>
        </div>
    </RightSideLayout>


</template>

<script>
    import Layout from '../../Template/Layout.vue';
    import RightSideLayout from '../../Template/RightSideLayout.vue';
    import Navbar from '../../Template/NavigationBar.vue'
    import { sideBar, removeWidth } from '../../../sideBar';
    export default {
        layout: Layout,
        components: {
            Navbar,
            RightSideLayout,
        },
        mounted() {
            removeWidth()
        }
    }
</script>

<style scoped>
</style>
