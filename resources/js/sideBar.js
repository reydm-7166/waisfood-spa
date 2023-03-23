const sideBar = () => {
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const leftNavBar = document.getElementById('left-navbar')
    const rightContent = document.getElementById('right-content')

    closeBtn.addEventListener("click",function(){
        console.log("working button")
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


export default sideBar;
