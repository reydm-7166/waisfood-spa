<template>
    <body id="container">
        <Head title="WaisFood"/>
        <SidebarLayout>
            <Navbar></Navbar>
        </SidebarLayout>

        <RightSideLayout>

        </RightSideLayout>
    </body>

</template>

<script>
    import Layout from '../Template/Layout.vue';
    import SidebarLayout from '../Template/SidebarLayout.vue';
    import RightSideLayout from '../Template/RightSideLayout.vue';

    import Navbar from '../Template/NavigationBar.vue'
    export default {
        layout: Layout,
        components: {
            Navbar,
            SidebarLayout,
            RightSideLayout,
        }
    }
</script>

<style scoped>
</style>
