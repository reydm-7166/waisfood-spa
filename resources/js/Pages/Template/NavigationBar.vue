<template>
<div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">WaisFood Account</div>
      <i class="bx bx-menu text-dark" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <NavLink href="/">
                <i class='bx bx-home'></i>
                <span class="link_name">Home</span>
            </NavLink>
            <span class="tooltip">Home</span>
        </li>

      <li>
        <NavLink href="/newsfeed">
            <i class='bx bx-news'></i>
            <span class="link_name">Newsfeed</span>
        </NavLink>
        <span class="tooltip">Newsfeed</span>
      </li>
      <li>
        <NavLink  href="/generator">
            <i class='bx bx-food-menu'></i>
            <span class="link_name">Generator</span>
        </NavLink>
        <span class="tooltip">Generator</span>
      </li>
      <li>
        <NavLink href="/profile">
            <i class="bx bx-user"></i>
            <span class="link_name">Profile</span>
        </NavLink>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <NavLink>
            <i class="bx bx-chat"></i>
            <span class="link_name">Message</span>
        </NavLink>
        <span class="tooltip">Message</span>
      </li>

      <li>
        <NavLink>
            <i class="bx bx-cog"></i>
            <span class="link_name">Settings</span>
        </NavLink>
        <span class="tooltip">Settings</span>
      </li>
    </ul>
  </div>
</template>

<script>
    import NavLink from './NavigationLink.vue'
    import { ref, onMounted, nextTick  } from 'vue';
    // import { myFunction } from '../../sideBar.js';
    export default {
        components: {
            NavLink,
        },
        setup() {
            const message = ref('Hello, world!');

        },
        mounted() {
            let sidebar, closeBtn, leftNavBar, rightContent;

            sidebar = document.querySelector(".sidebar");
            closeBtn = document.querySelector("#btn");
            leftNavBar = document.getElementById('left-navbar')
            rightContent = document.getElementById('right-content')

            closeBtn.addEventListener("click",function(){
                sidebar.classList.toggle("open")
                menuBtnChange()
            })

            function menuBtnChange(){
                if(sidebar.classList.contains("open")){
                    leftNavBar.classList.remove('left-navbar')
                    leftNavBar.classList.add('expand-side-container')
                    rightContent.classList.remove('content')
                    rightContent.classList.add('expand-right-container')
                    closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
                }else{
                    leftNavBar.classList.remove('expand-side-container')
                    rightContent.classList.add('content')
                    rightContent.classList.remove('expand-right-container')
                    leftNavBar.classList.add('left-navbar')
                    closeBtn.classList.replace("bx-menu-alt-right","bx-menu")

                }
            }
        },
    }
</script>

<style scoped>

</style>
