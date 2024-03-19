const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");
const body = document.querySelector("#pageHeader");
let lastScroll = 0;

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
    body.classList.toggle("active")
})

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset
 
    if(currentScroll > lastScroll && !body.classList.contains("scrollDown") && !body.classList.contains("active")){
        body.classList.add("scrollDown")
        
    }

    if(currentScroll < lastScroll && body.classList.contains("scrollDown") && !body.classList.contains("active")){
        body.classList.remove("scrollDown")
    }

    if(currentScroll > lastScroll && !body.classList.contains("veryScrollDown") && body.classList.contains("active")){
        body.classList.remove("scrollDown")
        body.classList.add("veryScrollDown")
    }

    if(currentScroll < lastScroll && body.classList.contains("veryScrollDown") && body.classList.contains("active")){
        body.classList.remove("scrollDown")
        body.classList.remove("veryScrollDown")
    }

    lastScroll = currentScroll;
})