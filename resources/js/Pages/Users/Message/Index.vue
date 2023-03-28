<template>

    <Head title="Messages"/>

    <RightSideLayout>
        <div class="bg fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
                <h1 class="font fw-bold">You are in Message page!</h1>
            </div>
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
    .content {
        transition: all 0.5s ease;
        width: 95%;
    }
    #right-content {
        height: fit-content;
        min-height: 100vh;
    }
</style>
