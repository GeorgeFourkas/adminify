const sidebar = document.getElementById("sidebar");
const burger = document.getElementById("burger");
const overlay = document.getElementById("overlay");
const close = document.getElementById("close_sidemenu");
burger.addEventListener("click", () => {
    overlay.classList.toggle("block")
    sidebar.classList.toggle("-translate-x-full");
    overlay.classList.toggle("hidden")
    document.querySelector('body').classList.add('overflow-y-hidden')
})
close.addEventListener("click", () => {
    overlay.classList.toggle("block")
    sidebar.classList.add("-translate-x-full");
    overlay.classList.toggle("hidden")
    document.querySelector('body').classList.remove('overflow-y-hidden')

});
window.addEventListener("resize", () => {
    if (overlay.classList.contains('block') && window.innerWidth >= 1200) {
        overlay.classList.toggle("hidden")
        document.querySelector('body').classList.remove('overflow-y-hidden')

    }
})


overlay.addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        overlay.classList.toggle("block")
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden")
        document.querySelector('body').classList.remove('overflow-y-hidden')
    }
})
