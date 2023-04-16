<template>
    <Head :title="recipe.recipe_name"/>
    <div class="w-100 p-3" id="main-container">
        <div id="container" class="w-100">
            <div id="title" class="w-100 text-center">
                <!-- <h1 class="text-outline font-3"></h1> -->
                <h1 class="ml1 font-3">
                    <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters text-outline">{{ recipe.recipe_name }}</span>
                        <span class="line line2"></span>
                    </span>
                </h1>
            </div>
            <div id="body-container" class="">
                <div id="details-container" class="mx-2 rounded p-2">
                    <div id="ingredients" class="w-50 rounded h-100 mx-2">
                        <div id="label" class="w-100 text-center">
                            <p class="fs-3 font-2 fw-bold">Ingredients</p>
                        </div>
                        <div id="items" class="px-4">
                            <ul>
                                <li v-for="ingredient in recipeData">
                                    <p class="fs-5 font-3">{{ ingredient.ingredient}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="directions" class="w-50 rounded h-100 mx-2">
                        <div id="label" class="w-100 text-center">
                            <p class="fs-4 font-2 fw-bold">Instructions</p>

                        </div>
                        <div id="items">

                        </div>
                    </div>
                </div>

                <div id="image-container" class="mx-2 rounded pt-2">
                    <div
                        id="carouselExampleIndicators"
                        class="carousel slide h-100"
                        data-bs-ride="true"
                    >
                        <div class="carousel-indicators">
                            <button
                                type="button"
                                data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0"
                                class=""
                                aria-label="Slide 1"
                            ></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/800px-Image_created_with_a_mobile_phone.png"
                                     alt=""
                                     class="w-100 h-100"/>

                            </div>
                        </div>
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev"
                        >
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next"
                        >
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { animation } from '../../../recipeAnimation.js';
    import {onMounted, ref } from 'vue';

    const props = defineProps({
        recipe: {
            type: Object,
            required: true
        }
    })

    const recipeData = ref(props.recipe.ingredients);




    onMounted( () => {
        animation();
    });


</script>
<style scoped>
    @media only screen and (max-width: 480px) {

    }
    @media only screen and (min-width: 481px) {

        #main-container {
            height: fit-content;
            min-height: 200vh;
        }
        #container {
            height: 150vh;
        }
        #container #body-container {
            display: flex;
            flex-direction: column-reverse;
            height: 100%;
        }
        #details-container, #image-container {
            height: 100%;
            width: 100%;
        }
        #body-container {
            padding: 1rem;
        }
        .mx-2, .p-2 {
            margin: 3px 0 3px 0 !important;
            padding: 0 !important;
        }
        #ingredients, #directions {
            width: 100% !important;
        }
        #details-container {
            display: flex;
            flex-direction: column;
        }
        .carousel-item {
            width: 100%;
        }
        .carousel-item img {
            border-radius: .4rem;
        }
    }
    @media only screen and (min-width: 1024px) {
        #main-container {
            height: 100vh;
            background-color: #F9F4DA;
        }
        #body-container {
            height: 80%;
            background-color: #FCBA28;
            margin: 20px 10px 0 10px;
            border-radius: .5rem;
            display: flex;
            flex-direction: row !important;
        }

        #details-container {
            display: flex;
            flex-direction: row;
            height: 100%;
        }
        #image-container {

            height: 100%;
        }
        #carouselExampleIndicators {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            flex-direction: row !important;
        }
        #body-container {
            height: 60% !important;
        }
        #container {
            height: 68%;
        }
        #ingredients, #directions {
            margin: 0 2px 0 2px !important;
        }
    }
    #body-container {
        height: 82vh;
        background-color: #FCBA28;
        margin: 20px 10px 0 10px;
        border-radius: .5rem;
    }

    .text-outline {
        text-shadow:
            -1px -1px 0 #000,
            1px -1px 0 #000,
            -1px 1px 0 #000,
            1px 1px 0 #000;
        color: #ED203D;
        font-size: 80px;
    }
    .ml1 {
  font-weight: 900;
  font-size: 3.5em;
}

.ml1 .letter {
  display: inline-block;
  line-height: 1em;
}

.ml1 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em;
}

.ml1 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 3px;
  width: 100%;
  background-color: #ED203D;
  transform-origin: 0 0;
}

.ml1 .line1 { top: 0; }
.ml1 .line2 { bottom: 0; }
</style>
