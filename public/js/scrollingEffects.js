const navbar = document.querySelector('.navbar');

window.addEventListener("scroll", () => {
    if (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) {
        navbar.style.backgroundColor = "#5c5b5b";
    } else {
        navbar.style.backgroundColor = "transparent";
    }
});