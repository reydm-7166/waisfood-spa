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
        background-color: #7A4988;
        height: fit-content;
    }
</style>
