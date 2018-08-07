module.exports = (menu) => {
    const menuOpen = menu.querySelector('.btn_nav');
    const menuClose = menu.querySelector('.close_nav');
    const bgClose = document.querySelector('.bg_close');

    const arrNavElemMore = menu.querySelectorAll('.nav_list_more');
    const arrNavControl = menu.querySelectorAll('.nav_control');
    const flatpickr = require("flatpickr");

    menuOpen.addEventListener('click', () => {
        menu.classList.toggle('active');
        bgClose.classList.add('active');
    });

    menuClose.addEventListener('click', () => {
        menu.classList.remove('active');
        bgClose.classList.remove('active');
    });


    for (let i = 0; i < arrNavElemMore.length; i++) {
        let parent = arrNavElemMore[i].parentElement;
        let height = arrNavElemMore[i].clientHeight;

        arrNavElemMore[i].classList.add('def');

        parent.addEventListener('mouseenter', function () {
            parent.classList.add('hover');
            arrNavElemMore[i].style.height = `${height}px`;
        });
        parent.addEventListener('mouseleave', function () {
            parent.classList.remove('hover');
            arrNavElemMore[i].removeAttribute('style');
        });
    }

    for (let i = 0; i < arrNavControl.length; i++) {
        let width = arrNavControl[i].clientWidth;
        let elemLink = arrNavControl[i].parentElement.querySelector('.nav_link');
        elemLink.style.paddingRight = `${width * 1.05}px`;

    }

    bgClose.addEventListener('click', () => {
        menu.classList.remove('active');
        bgClose.classList.remove('active');
    });


};