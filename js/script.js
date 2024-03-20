const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");
const header = document.querySelector("#pageHeader");
const arrow = document.querySelector("#upArrow");
console.log(arrow);
let lastScroll = 0;

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
    header.classList.toggle("active")
})

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset
    
    if(currentScroll == 0) {
        arrow.classList.add("scrollDown")
    }

    if(currentScroll > lastScroll && !header.classList.contains("scrollDown") && !header.classList.contains("active")){
        header.classList.add("scrollDown")
        arrow.classList.add("scrollDown")
    }

    if(currentScroll < lastScroll && header.classList.contains("scrollDown") && !header.classList.contains("active")){
        header.classList.remove("scrollDown")
        arrow.classList.remove("scrollDown")
    }

    if(currentScroll > lastScroll && !header.classList.contains("veryScrollDown") && header.classList.contains("active")){
        header.classList.remove("scrollDown")
        arrow.classList.add("scrollDown")
        header.classList.add("veryScrollDown")
    }

    if(currentScroll < lastScroll && header.classList.contains("veryScrollDown") && header.classList.contains("active")){
        header.classList.remove("scrollDown")
        arrow.classList.remove("scrollDown")
        header.classList.remove("veryScrollDown")
    }

    lastScroll = currentScroll;
})