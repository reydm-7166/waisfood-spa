<template>
<div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">WaisFood Account</div>
      <i class="bx bx-menu text-dark" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li class="w-100">
        <i class="bx bx-search"></i>
        <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
      </li>
      <li>
        <NavLink href="/newsfeed">
            <i class='bx bx-news'></i>
            <span class="link_name">Newsfeed</span>
        </NavLink>
        <span class="tooltip">Newsfeed</span>
      </li>
      <li>
        <NavLink>
            <i class='bx bx-food-menu'></i>
            <span class="link_name">Generator</span>
        </NavLink>
        <span class="tooltip">Generator</span>
      </li>
      <li>
        <NavLink>
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

<script setup>
    import NavLink from './NavigationLink.vue'
</script>

<style scoped>

</style>
