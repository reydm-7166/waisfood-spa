<template>
    <div class="d-inline-block left-navbar" id="left-navbar">
        <slot/>
    </div>
</template>

<script setup>

</script>

<style scoped>
    #left-navbar {
        height: 100%;
    }
    .left-navbar {
        width: 95px;
        transition: all 0.5s ease;
    }

</style>

