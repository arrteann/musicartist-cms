let open = document.querySelector(".menu");
let close = document.querySelector(".nav-menu");
let nav = document.querySelector("nav");

open.addEventListener("click", e => {
    nav.classList.toggle("open");
});
close.addEventListener("click", e => {
    nav.classList.toggle("open");
});