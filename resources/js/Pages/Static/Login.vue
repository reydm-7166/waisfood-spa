<template>
    <Head title="Login"/>
    <RightSideLayout>
        <div class="bg bg-secondary fs-4 p-3 d-inline-block align-top content d-flex justify-content-center" id="right-content">
            <div id="register-container" class="bg bg-secondary">
                {{ data }}
            </div>
        </div>
    </RightSideLayout>

</template>

<script setup>
    import RightSideLayout from '../Template/RightSideLayout.vue';
    import { defineProps } from 'vue';

    defineProps({
        data: {
            type: Boolean,
            default: false
        }
    })



</script>

<style scoped>

</style>
