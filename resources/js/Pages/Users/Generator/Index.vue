<template>

    <Head title="Generator"/>

    <RightSideLayout>
        <div class="bg fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="head" class="bg bg-secondary w-100 rounded p-2 text-center d-flex justify-content-center align-items-center p-3">
                <div id="search" class="w-50 d-flex justify-content-center align-items-center">
                    <i class='bx bx-search'></i><input type="text" name="search" id="search" class="form-control rounded-pill ps-4 font" placeholder="Search for recipe, meals and food ...">
                </div>

                <div id="icons" class="w-50 d-flex justify-content-end align-items-center">
                    <i class='bx bx-message-dots'></i>
                    <i class='bx bxs-bell'></i>
                    <i class='bx bxs-user-circle' ></i>
                </div>
            </div>
            <section id="body" class="w-100 p-2 bg bg-secondary mt-3 rounded d-flex">
                <div id="un-recipes" class="w-75 bg bg-warning rounded mx-1 pt-15">
                    <div id="wrapper" class="bg bg-warning d-flex justify-content-between flex-wrap p-2 rounded">
                        <div id="card" class="bg bg-secondary rounded shadow-lg mx-1 mt-2">

                        </div>
                        <div id="card" class="bg bg-secondary rounded shadow-lg mx-1 mt-2">

                        </div>
                        <div id="card" class="bg bg-secondary rounded shadow-lg mx-1 mt-2">

                        </div>
                        <div id="card" class="bg bg-secondary rounded shadow-lg mx-1 mt-2">

                        </div>
                        <div id="card" class="bg bg-secondary rounded shadow-lg mx-1 mt-2">

                        </div>
                    </div>

                </div>
                <div id="filters" class="w-25 bg bg-warning rounded mx-1 p-2 font-3 fw-bold">Filter</div>
            </section>
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
    #wrapper {
        height: fit-content;
        min-height: 200px;
    }
    .content {
        transition: all 0.5s ease;
        width: 95%;
    }
    #right-content {
        height: fit-content;
        min-height: 100vh;
    }
    i {
        margin: 0 25px;
        font-size: 2rem;
    }
    i:hover {
        cursor: pointer;
        color: rgb(74, 74, 175);
    }
    #body {
        min-height: 125vh;
        height: fit-content;
    }

    #card {
        height: 200px;
        margin: 10px 0;
        width: 24%;
    }
    #un-recipes {
        min-height: 90vh;
    }

</style>
