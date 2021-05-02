const loader = document.querySelector('.loader');
const html = document.querySelector('html');

window.addEventListener('load', () => {
    loader.classList.add('out-transition');
    setTimeout(() => {loader.remove()}, 400)
    html.style.overflowY = 'visible';
})