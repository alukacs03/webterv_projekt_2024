const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
})

const body = document.querySelector("#pageHeader");
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset

    if(currentScroll <= 0){
        body.classList.remove("scrollUp")
    }
        
    if(currentScroll > lastScroll && !body.classList.contains("scrollDown")){
        body.classList.remove("scrollUp")
        body.classList.add("scrollDown")
    }

    if(currentScroll < lastScroll && body.classList.contains("scrollDown")){
        body.classList.remove("scrollDown")
        body.classList.add("scrollUp")
    }

    lastScroll = currentScroll;
})