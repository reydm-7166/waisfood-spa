const sideBar = () => {
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        removeWidth();
    }
}

const removeWidth = () => {
    let sidebar = document.querySelector(".sidebar");
    let rightContent = document.getElementById('right-content')
    let leftNavBar = document.getElementById('left-navbar')
    let closeBtn = document.querySelector("#btn");

    if(sidebar.classList.contains("open")){
        rightContent.classList.add('expand-right-container')
        rightContent.classList.remove('content')
        leftNavBar.classList.add('expand-side-container')
        leftNavBar.classList.remove('left-navbar')
        closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
    } else {
        rightContent.classList.add('content')
        leftNavBar.classList.remove('expand-side-container')
        rightContent.classList.remove('expand-right-container')
        leftNavBar.classList.add('left-navbar')
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
    }


}


export { sideBar, removeWidth };
