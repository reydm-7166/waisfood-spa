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
            <div id="body-container">
            </div>
        </div>
    </div>
</template>

<script>
    import { animation } from '../../../recipeAnimation.js';

    export default {
        props: {
            recipe: {
                type: Object,
                required: true
            }
        },
        mounted() {
            animation();
        }
    }

</script>

<style scoped>
    #body-container {
        height: 82vh;
        background-color: #FCBA28;
        margin: 20px 10px 0 10px;
        border-radius: .5rem;
    }

    #main-container {
        height: 100vh;
        background-color: #F9F4DA;
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
