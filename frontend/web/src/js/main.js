;
(() => {
    'use strict';

    /*variables*/

    /*main slider*/
    const mainArrElem = document.querySelectorAll('.slider_main .slider_main_elem');
    const mainLeft = document.querySelector('.slider_main .control_left');
    const mainRight = document.querySelector('.slider_main .control_right');
    /*victory slider*/
    const victorySlider = document.querySelector('.victory_slider');
    const victorySliderEl = document.querySelectorAll('.victory_slider .victory_slider_elem');
    const victorySliderDot = document.querySelector('.victory_slider .victory_slider_dot');
    /*menu*/
    const header = document.querySelector('.header_main');
    const menu = document.querySelector('.nav_main');
    /*quote slider*/
    const quote = document.querySelector('.quote_slider');
    const quoteElem = document.querySelectorAll('.quote_slider .quote_slider_elem');
    /*certificate slider*/
    const certificate = document.querySelector('.footer_certificate');
    const certificateElem = document.querySelector('.certificate_wrap');
    /*scroll mews*/
    const arrScrollNews = document.querySelectorAll('.news_min_content');
    /*shape parallax*/
    const blockShape = document.querySelector('.main_section');
    const arrShape = document.querySelectorAll('.main_section [class^="shape"]');
    /*scroll up*/
    const btnUp = document.querySelector('.btn_up');
    /*animations block*/
    const arrAnimation = document.querySelectorAll('.animation');
    /*open feedback*/
    const btnFeedback = document.querySelectorAll('.get_feedback');
    const popupFeedback = document.querySelector('.feed_back_popup');
    const popupBg = document.querySelector('.main_popup_bg');
    let mobileBoll = false;
    /*feedback send*/
    const feedback = document.querySelectorAll('.feedback');
    /*phone mask*/
    const myInput = document.querySelectorAll('input[type=tel]');
    /*btn send form popup*/
    const btnSuccessful = document.querySelector('.send_successful_close');
    /*year*/
    const yearFooter = document.querySelector('.site_map .site_map_year');
    /*dote scroll*/
    const arrDoteScroll = document.querySelectorAll('.dote_scroll');
    const doteBlock = document.querySelector('.dote_block');

    /*paralax all*/
    let Parallax = require('scroll-parallax');
    let p = new Parallax('.parallax').init();
    /*menu*/
    if (menu) {
        (require('./modules/menu'))(header, menu)
    }

    /*main slider*/
    if (mainLeft && mainRight) {
        (require('./modules/main-slider'))(mainArrElem, mainLeft, mainRight);
    }
    /*victory slider*/
    if (victorySlider) {
        (require('./modules/victory-slider'))(victorySlider, victorySliderEl, victorySliderDot);
    }
    /*quote slider*/
    if (quote) {
        (require('./modules/quote'))(quote, quoteElem);
    }
    /*certificate slider*/
    if (certificate) {
        (require('./modules/certificate-slider'))(certificate, certificateElem);
    }
    /*scroll news*/
    if (arrScrollNews) {
        (require('./modules/scroll-news'))(arrScrollNews);
    }
    /*shape parallax*/
    let shapeMove = null;
    if (blockShape) {
        shapeMove = require('./modules/shape-parallax');
    }
    /*scroll up*/
    if (btnUp) {
        let scrollUp = require('./modules/functions/scroll-up');
        btnUp.addEventListener('click', () => {
            scrollUp(50);
        })
    }
    /*animation*/
    let addAnimation = null;
    if (arrAnimation.length > 0) {
        addAnimation = require('./modules/animation');
        addAnimation(arrAnimation);
    }
    /*feedback send*/
    if (btnSuccessful !== null) {
        btnSuccessful.addEventListener('click', function () {
            this.parentElement.parentElement.classList.remove('active');
        });
    }

    if (feedback.length > 0) {
        (require('./modules/feedback'))(feedback, popupFeedback, popupBg);
    }

    /*open feedback*/
    if (btnFeedback.length > 0 && popupFeedback) {
        for (let i = 0; i < btnFeedback.length; i++) {
            btnFeedback[i].addEventListener('click', () => {
                popupBg.classList.add('active');
                popupFeedback.classList.add('active');
                if (mobileBoll) {
                    document.body.style.overflow = 'hidden';
                }
            });
        }
        popupFeedback.querySelector('.close_feedback').addEventListener('click', () => {
            popupBg.classList.remove('active');
            popupFeedback.classList.remove('active');
            document.body.removeAttribute('style');

        });
        popupBg.addEventListener('click', function () {
            this.classList.remove('active');
            popupFeedback.classList.remove('active');
            document.body.removeAttribute('style');
        });
    }

    /*phone mask*/
    if (myInput) {
        let vanillaTextMask = require('vanilla-text-mask');
        let phoneMask = ['+', '3', '8', '(', /\d/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, '-', /\d/, /\d/];

        for (let i = 0; i < myInput.length; i++) {
            vanillaTextMask.maskInput({
                inputElement: myInput[i],
                mask: phoneMask,
                keepCharPositions: true
            });
        }
    }

    /*social icon*/
    let headerContainer = document.querySelector('.header_main .container');
    let languages = document.querySelector('.header_main .container>.languages');
    let newLanguages = null;
    if (languages !== null) {
        newLanguages = languages.cloneNode(true);
    }

    /*main scroll*/
    window.addEventListener('scroll', () => {
        let scrolled = window.pageYOffset || document.documentElement.scrollTop;

        /*shape parallax*/
        if (blockShape) {
            shapeMove(blockShape, arrShape, scrolled)
        }
        /*animation*/
        if (arrAnimation.length > 0) {
            addAnimation(arrAnimation);
        }

    });

    /*main mobile*/
    if (window.innerWidth < 768) {
        headerContainer.removeChild(languages);
        menu.appendChild(newLanguages);
        /*feedback*/
        mobileBoll = true;
    }
    window.addEventListener('resize', function () {
        try {
            if (this.innerWidth < 768) {
                /*social icon*/
                let languages = header.querySelector('.container>.languages');
                let timeLanguages = newLanguages.cloneNode(true);
                headerContainer.removeChild(languages);
                menu.appendChild(timeLanguages);

                /*feedback*/
                mobileBoll = true;
            } else {
                /*social icon*/
                let noLanguages = menu.querySelector('.languages');
                let timeLanguages = newLanguages.cloneNode(true);
                menu.removeChild(noLanguages);
                headerContainer.appendChild(timeLanguages);

                /*feedback*/
                mobileBoll = false;
            }
        } catch (err) {

        }
    });
    /*year*/
    if (yearFooter !== null) {
        let dayYear = new Date();
        yearFooter.innerHTML = dayYear.getFullYear();
    }

    /*dote scroll*/
    if (arrDoteScroll.length > 0 && doteBlock !== null) {
        (require('./modules/dote-block'))(arrDoteScroll, doteBlock, header);

    }


})();
