<template>
    <div id="main-container">
        <SidebarLayout >
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
</style>
