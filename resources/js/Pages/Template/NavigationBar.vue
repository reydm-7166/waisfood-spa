<template>
<div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">WaisFood</div>
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
        <NavLink href="/messages">
            <i class="bx bx-chat"></i>
            <span class="link_name">Message</span>
        </NavLink>
        <span class="tooltip">Message</span>
      </li>

      <li>
        <NavLink href="/settings">
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
    import { ref } from 'vue';
    export default {
        components: {
            NavLink,
        },
        setup() {
            const message = ref('Hello, world!');
        },
    }
</script>

<style scoped>

</style>
