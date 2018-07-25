module.exports = (arrDote, doteBlock, header) => {
    const wrapDoteElem = doteBlock.querySelector('.dote_block_list');
    const downBtn = doteBlock.querySelector('.dote_block_next');
    const scrollFunc = require('./functions/scroll-to-block');
    const arrDoteTouch = [];
    const arrDoteLength = arrDote.length;
    let counter = 0;


    function whatBg(elem) {
        if (elem === arrDoteTouch[0]) {
            doteBlock.classList.add('white');
        } else {
            doteBlock.classList.remove('white');
        }
    }

    function setClass(int, arr) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        arr[int].classList.add('active');
    }

    function whatScroll() {
        for (let i = 0; i < arrDoteLength; i++) {
            if (arrDote[i].getBoundingClientRect().top < 100 && arrDote[i].getBoundingClientRect().top > -100) {
                setClass(i, arrDoteTouch);
                counter = i;
                if (i === 0) {
                    doteBlock.classList.add('white');
                } else {
                    doteBlock.classList.remove('white');
                }
            }
        }
    }

    downBtn.addEventListener('click', () => {
        if (counter < arrDoteLength - 1) {
            scrollFunc(arrDote[counter + 1], header);
        }
    });
    for (let i = 0; i < arrDoteLength; i++) {
        let elemDote = document.createElement('div');
        elemDote.className = 'dote_block_elem';

        elemDote.addEventListener('click', function () {
            whatBg(this);
            for (let i = 0; i < arrDoteTouch.length; i++) {
                arrDoteTouch[i].classList.remove('active');
            }
            elemDote.classList.add('active');
            scrollFunc(arrDote[i], header);
        });

        wrapDoteElem.appendChild(elemDote);
        arrDoteTouch.push(elemDote);
    }

    arrDoteTouch[0].classList.add('active');


    window.addEventListener('scroll', () => {
        whatScroll();
        if (counter === arrDoteLength - 1) {
            doteBlock.classList.add('up')
        } else {
            doteBlock.classList.remove('up')
        }
    });

};