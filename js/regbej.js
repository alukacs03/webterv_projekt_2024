const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");
const header = document.querySelector("#pageHeader");

const sideNav = document.querySelector("#sideNav");
const sideMenu = document.querySelector(".sideMenu");
const sideHamburger = document.querySelector(".sideHamburger");
const adminMainWrapper = document.querySelector(".adminMainWrapper");

let lastScroll = 0;

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
    header.classList.toggle("active")
})

sideHamburger.addEventListener("click", () =>{
    sideHamburger.classList.toggle("active")
    sideMenu.classList.toggle("active")
    sideNav.classList.toggle("active")
    adminMainWrapper.classList.toggle("active")
})

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset

    if(currentScroll > lastScroll && !header.classList.contains("scrollDown") && !header.classList.contains("active")){
        header.classList.add("scrollDown")
    }

    if(currentScroll < lastScroll && header.classList.contains("scrollDown") && !header.classList.contains("active")){
        header.classList.remove("scrollDown")
    }

    if(currentScroll > lastScroll && !header.classList.contains("veryScrollDown") && header.classList.contains("active")){
        header.classList.remove("scrollDown")
        header.classList.add("veryScrollDown")
    }

    if(currentScroll < lastScroll && header.classList.contains("veryScrollDown") && header.classList.contains("active")){
        header.classList.remove("scrollDown")
        header.classList.remove("veryScrollDown")
    }

    lastScroll = currentScroll;
})