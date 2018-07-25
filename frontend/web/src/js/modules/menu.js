const scrollMenu = require('./functions/scroll-menu');
module.exports = (header, menu, boll) => {


    let arrHoverList = menu.querySelectorAll('.list_page>li');
    let scrollNav = menu.querySelector('.scroll_nav>i');
    let btn = header.querySelector('.btn_nav_open');
    let bgMenu = document.querySelector('.menu_popup_bg');
    let linkFirst = menu.querySelectorAll('.list_page>li>a');

    btn.addEventListener('click', function () {

        menu.classList.toggle('active');
        bgMenu.classList.toggle('active');

        if (this.classList.toggle('active') && window.innerWidth < 769) {
            menu.style.height = `calc(100vh - ${header.clientHeight}px)`;
            document.body.style.overflow = 'hidden';
        } else {
            document.body.removeAttribute('style');
            menu.removeAttribute('style');
        }
    });
    bgMenu.addEventListener('click', function () {
        this.classList.remove('active');
        btn.classList.remove('active');
        menu.classList.remove('active');
    });

    for (let i = 0; i < arrHoverList.length; i++) {
        arrHoverList[i].addEventListener('mouseover', () => {
            let topMove = arrHoverList[i].offsetTop + (arrHoverList[i].clientHeight / 2 - scrollNav.clientHeight / 2);
            scrollNav.style.top = `${topMove}px`;
        });
        arrHoverList[i].addEventListener('mouseout', () => {
            scrollNav.style.top = `5%`;
        })
    }

    scrollMenu(header);


    /*mobile touch*/
    for (let i = 0; i < linkFirst.length; i++) {
        linkFirst[i].addEventListener('click', function (e) {
            if (e.target.classList.contains('open_more_menu')) {
                e.preventDefault();
                for (let o = 0; o < linkFirst.length; o++) {
                    if (linkFirst[o].parentElement !== this.parentElement) {
                        linkFirst[o].parentElement.classList.remove('active');
                    }
                }
                this.parentElement.classList.toggle('active');
            }
        })
    }

};