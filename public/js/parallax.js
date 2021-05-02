const target = document.querySelectorAll('.parallax');

if (window.screen.width >= 1000) {
    window.addEventListener('scroll', () => {

        for (let index = 0; index < target.length; index++) {

            let posX = 0;
            let posY = 0;

            if (typeof target[index].dataset.parallaxRateH !== 'undefined') {
                posX = window.pageYOffset * target[index].dataset.parallaxRateH;
            }
            if (typeof target[index].dataset.parallaxRateV !== 'undefined') {
                posY = window.pageYOffset * target[index].dataset.parallaxRateV;
            }

            target[index].style.transform = 'translate3d(' + posX + 'px, ' + posY + 'px, 0px)';
        }
    })
}