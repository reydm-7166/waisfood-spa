import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
})


window.onload = function(){
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")
    const leftNavBar = document.getElementById('left-navbar')
    const rightContent = document.getElementById('right-content')

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    searchBtn.addEventListener("click",function(){
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
}
