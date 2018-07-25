module.exports = (arrElem, left, right) => {


    let yak = 0;
    let interval = null;
    let timeout = null;

    arrElem[0].classList.add('active');

    right.addEventListener('click', () => {
        clearInterval(interval);
        clearTimeout(timeout);
        moveSlider(arrElem, true);
        timeout = setTimeout(() => {
            modeDef();
        }, 4000)
    });

    left.addEventListener('click', () => {
        clearInterval(interval);
        clearTimeout(timeout);
        moveSlider(arrElem, false);
        timeout = setTimeout(() => {
            modeDef();
        }, 4000)
    });

    function moveSlider(arr, boll) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        yak = lastElem(arr, yak, boll);
        arr[yak].classList.add('active');
    }

    function lastElem(arr, int, boll) {
        if (boll) {
            return (arr[int + 1]) ? int + 1 : 0;
        } else {
            return (arr[int - 1]) ? int - 1 : arr.length - 1;
        }
    }

    function modeDef() {
        interval = setInterval(() => {
            moveSlider(arrElem, true);
        }, 5000);
    }

    for (let i = 0; i < arrElem.length; i++) {
        let btnSli = arrElem[i].querySelector('.btn');

        btnSli.addEventListener('mouseenter', () => {
            clearInterval(interval);
            clearTimeout(timeout);
        });
        btnSli.addEventListener('mouseleave', () => {
            modeDef();
        });
    }


    document.addEventListener('keyup', (e) => {
        let heightSlider = document.querySelector('.section_top').clientHeight / 2;
        let bollBtn = document.body.scrollTop < heightSlider;

        if (e.keyCode === 39 && bollBtn) {
            clearInterval(interval);
            clearTimeout(timeout);
            moveSlider(arrElem, true);
            timeout = setTimeout(() => {
                modeDef();
            }, 4000);

            right.classList.add('active');
            setTimeout(() => {
                right.classList.remove('active');
            }, 500);
        } else if (e.keyCode === 37 && bollBtn) {
            clearInterval(interval);
            clearTimeout(timeout);
            moveSlider(arrElem, false);
            timeout = setTimeout(() => {
                modeDef();
            }, 4000);

            left.classList.add('active');
            setTimeout(() => {
                left.classList.remove('active');
            }, 500);

        }
    });

    modeDef();
};