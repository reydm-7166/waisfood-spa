<template>

    <Head title="News Feed | WaisFood"/>

    <RightSideLayout>
        <div class="bg fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center">
                <h1 class="font fw-bold">You are in newsfeed page!</h1>
            </div>
        </div>
    </RightSideLayout>


</template>

<script setup>
    import RightSideLayout from '../../Template/RightSideLayout.vue';

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
