<template>

    <Head title="Profile | WaisFood"/>

    <RightSideLayout>
<!--        <div class="bg fs-4 p-3 d-inline-block align-top content bg-main" id="right-content">-->
<!--          <div class="form">-->
<!--            <div class="input-container ic1">-->
<!--              <input id="firstname" class="input" type="text" placeholder=" " />-->
<!--              <div class="cut"></div>-->
<!--              <label for="firstname" class="placeholder">First name</label>-->
<!--            </div>-->
<!--            <div class="input-container ic2">-->
<!--              <input id="lastname" class="input" type="text" placeholder=" " />-->
<!--              <div class="cut"></div>-->
<!--              <label for="lastname" class="placeholder">Last name</label>-->
<!--            </div>-->
<!--            <div class="input-container ic2">-->
<!--              <input id="email" class="input" type="text" placeholder=" " />-->
<!--              <div class="cut cut-short"></div>-->
<!--              <label for="email" class="placeholder">Email</label>-->
<!--            </div>-->
<!--            <button type="text" class="submit">submit</button>-->
<!--          </div>-->
<!--        </div>-->
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
    .form {
      border-radius: 20px;
      box-sizing: border-box;
      height: 500px;
      padding: 20px;
      width: 320px;
    }


    .placeholder {
      display: inline-block;
      min-height: 1em;
      vertical-align: middle;
      cursor: wait;
      background-color: unset;
    }

    .title {
      color: #eee;
      font-family: sans-serif;
      font-size: 36px;
      font-weight: 600;
      margin-top: 30px;
    }

    .subtitle {
      color: #eee;
      font-family: sans-serif;
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
    }

    .input-container {
      height: 50px;
      position: relative;
      width: 100%;
    }

    .ic1 {
      margin-top: 40px;
    }

    .ic2 {
      margin-top: 30px;
    }

    .input {
      background-color: white;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      font-size: 18px;
      height: 100%;
      outline: 0;
      padding: 4px 20px 0;
      width: 100%;
    }

    .cut {
      background-color: #F9F4DA;
      border-radius: 10px;
      height: 20px;
      left: 20px;
      position: absolute;
      top: -20px;
      transform: translateY(0);
      transition: transform 200ms;
      width: 110px;
    }

    .cut-short {
      width: 50px;
    }

    .input:focus ~ .cut,
    .input:not(:placeholder-shown) ~ .cut {
      transform: translateY(8px);
    }

    .placeholder {
      font-family: sans-serif;
      left: 20px;
      line-height: 14px;
      pointer-events: none;
      position: absolute;
      transform-origin: 0 50%;
      transition: transform 200ms, color 200ms;
      top: 20px;
    }

    .input:focus ~ .placeholder,
    .input:not(:placeholder-shown) ~ .placeholder {
      transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .placeholder {
      color: #808097;
    }

    .input:focus ~ .placeholder {
      color: black;
    }

    .submit {
      background-color: #08d;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      cursor: pointer;
      font-size: 18px;
      height: 50px;
      margin-top: 38px;
      outline: 0;
      text-align: center;
      width: 100%;
    }

    .submit:active {
      background-color: #06b;
    }


</style>
