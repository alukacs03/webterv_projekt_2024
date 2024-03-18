const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");
const header = document.querySelector(header);

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

window.addEventListener("scroll", () =>{
    
    
    console.log(document.documentElement.scrollHeight)
})