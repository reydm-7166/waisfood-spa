<template>
    <Head title="Generator"/>
    <Layout>
    <RightSideLayout />
        <div class="bg fs-4 p-3 d-inline-block align-top content" id="right-content">
            <div id="head" class="w-100 rounded p-2 text-center d-flex justify-content-center align-items-center p-3">
                <div id="search" class="w-50 d-flex justify-content-center align-items-center">
                    <i class='bx bx-search text-pri out-line'></i><input type="text" name="search" id="search" class="form-control rounded-pill ps-4 font text-dang" placeholder="Search for recipe, meals and food ...">
                </div>

                <div id="icons" class="w-50 d-flex justify-content-end align-items-center">
                    <i class='bx bx-message-dots text-pri out-line'></i>
                    <i class='bx bxs-bell text-pri out-line'></i>
                    <i class='bx bxs-user-circle text-pri out-line' ></i>
                </div>
            </div>
            <section id="body" class="w-100 p-2 mt-3 rounded d-flex">
                <div id="un-recipes" class="w-75 rounded mx-1 pt-15">
                    <div id="wrapper" class="d-flex flex-column justify-content-between p-2 rounded">
                        <div id="card-container" class="d-flex w-100 justify-content-start flex-wrap p-2">
                            <div id="card" class="rounded mx-1 mt-2 p-2" v-for="recipe in recipes.data">
                                <Link :href="route('generator.show', { id: recipe.slug })" class="text-decoration-none">
                                    <div id="border" class="border-start border-5 w-100 h-100 p-2 d-flex flex-column">
                                        <div id="recipe-name" class="h-75 w-100 px-1">
                                            <p class="font-3 text-dark text-break fs-5">{{ recipe.recipe_name }}</p>
                                            <!-- <div id="img-container" class="border border-dark bg bg-light border-1">
                                                as
                                            </div> -->
                                        </div>
                                        <div id="recipe-details" class="h-25 w-100 mt-1">

                                        </div>
                                    </div>
                                </Link>

                            </div>
                        </div>

                        <div id="paginate" class="rounded w-100 ms-2 mt-5 d-flex justify-content-center">
                            <button class="btn-warning px-3 mx-2 rounded font-2 fs-5 shadow-3d"
                                    :class="{ 'disabled': !linkPrev}">
                                <Link :href="recipes.prev_page_url" class="text-decoration-none"
                                      :class="{ 'text-disabled': !linkPrev}">Previous</Link>
                            </button>
                            <span class="text-dark mx-2 fs-5 font-2">Page {{recipes.current_page}}</span>
                            <button class="btn-warning px-3 mx-2 rounded font-2 fs-5 shadow-3d"
                                    :class="{ 'disabled': linkNext}">
                                <Link :href="recipes.next_page_url" class="text-decoration-none"
                                      :class="{ 'text-disabled': linkNext}">Next</Link>
                            </button>
                        </div>
                    </div>

                </div>
                <div id="filters" class="w-25 bg bg-warning rounded mx-1 p-2 font-3 fw-bold">
                    <div id="title" class=" text-center">
                        <p class="font-3 fs-1">Filter</p>
                    </div>

                    <div id="body">
                        <form @submit.prevent="submit">
                            <div class="form-check form-switch my-2 bg bg-light d-flex align-items-center justify-content-start py-2 rounded">
                                <input class="form-check-input fs-5 cursor-hand" name="all" type="checkbox" id="all" v-model="switch_all"
                                       @change="filter">
                                <label class="form-check-label ms-3 fs-6 cursor-hand fw-normal"
                                       for="all"
                                       :class="{
                                           'disabled-label' : switch_all !== true
                                       }">Select recipes with all ingredients</label
                                >
                            </div>

                            <div class="form-check form-switch my-2 bg bg-light d-flex align-items-center justify-content-start py-2 rounded">
                                <input class="form-check-input fs-5 cursor-hand" name="one" type="checkbox" id="one"
                                       v-model="switch_one"
                                       @change="filter">
                                <label class="form-check-label ms-3 fs-6 cursor-hand fw-normal"
                                       for="one"
                                       :class="{
                                            'disabled-label' : switch_one !== true
                                        }">At least one of the ingredients</label
                                >
                            </div>
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<script setup>
    import Layout from '../../Template/Layout.vue';
    import RightSideLayout from '../../Template/RightSideLayout.vue';
    import SidebarLayout from '../../Template/SidebarLayout.vue';
    import Navbar from '../../Template/NavigationBar.vue'
    import { sideBar, removeWidth } from '../../../sideBar';
    import { computed, onMounted, ref, defineProps, reactive } from "vue";
    import { useForm } from "@inertiajs/vue3";


    onMounted(() => {
        removeWidth()
    });

    function filter() {

    }

    const linkPrev = computed( () => {
        return props.recipes.current_page > 1 ? true : false
    })

    const linkNext = computed( () => {
        return props.recipes.next_page_url == null ? true : false
    })

    const props = defineProps({
        recipes: {
            type: Object,
            required: true,
        }
    })

    const switch_all = reactive({
        value: true,
    })

    const switch_one = reactive({
        value: false,
    })


</script>

<style scoped>
    .disabled-label {
        color: #a69d9d;
    }
    .shadow-3d {
        box-shadow: 5px 5px rgb(40, 96, 160);
    }
    .text-disabled {
        color: #666666;
    }
    .disabled {
        border: 1px solid #999999;
        background-color: #cccccc;
        color: #666666;
    }
    #card:hover {
        cursor: pointer;
        border: 2px solid black;
        transform: scale(1.04);
        transition: all 0.3s ease;
        box-shadow: 5px 10px rgb(40, 96, 160);
    }
    #paginate {
        height: fit-content;
        max-height: 100px;
    }
    .text-pri {
        color: #12B5E5;
    }
    .text-dang {
        color: #ED203D;
    }
    #search:focus {
        font-weight: 550;
        color: #ED203D;
    }
    .out-line {
        text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #705757;
    }
    #wrapper {
        height: fit-content;
        min-height: 97%;
    }
    #card-container {
        min-height: 90%;
        height: 100%;
    }
    .content {
        transition: all 0.5s ease;
        width: 95%;
    }
    #right-content {
        height: fit-content;
        min-height: 90vh;
        background-color: #F9F4DA;
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
        min-height: 80vh;
        height: fit-content;
        /* background-color: black; */
    }

    #card {
        height: 200px;
        margin: 10px 0;
        width: 24%;
        background-color: #FCBA28;
        box-shadow: 5px 10px #888888
    }
    #un-recipes {
        min-height: 85vh;
        background-color: #12B5E5;
    }


</style>
