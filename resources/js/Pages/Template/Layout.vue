<template>
    <div id="main-container">
        <SidebarLayout>
            <Navbar></Navbar>
        </SidebarLayout>
        <slot/>
    </div>

</template>

<script setup>
    import SidebarLayout from '../Template/SidebarLayout.vue';
    import Navbar from '../Template/NavigationBar.vue'

</script>

<style scoped>
    #main-container {
        min-height: 100vh;
        background-color: #F9F4DA;
        height: fit-content;
    }
</style>
