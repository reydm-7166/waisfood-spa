<template>
    <div class="bg bg-warning fs-4 p-3 d-inline-block align-top content" id="right-content">
        <slot/>
    </div>
</template>

<script setup>

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
