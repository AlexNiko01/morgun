module.exports = (wrap, arrELem) => {
    let yak = 0;
    let wrapQuote = wrap.querySelector('.quote_slider_wrap');
    let maxHeight = 0;

    for (let i = 0; i < arrELem.length; i++) {
        maxHeight = (maxHeight < arrELem[i].clientHeight) ? arrELem[i].clientHeight : maxHeight;
        arrELem[i].classList.add('move');
    }
    wrapQuote.style.height = `${maxHeight}px`;

    arrELem[0].classList.add('active');
    setInterval(() => {
        moveSlider(arrELem, true);
    }, 4000);

    function lastElem(arr, y, boll) {
        if (boll) {
            return (arr[y + 1]) ? y + 1 : 0;
        } else {
            return (arr[y - 1]) ? y - 1 : arr.length - 1;
        }
    }

    function moveSlider(arr, boll) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
        yak = lastElem(arr, yak, boll);
        arr[yak].classList.add('active');
    }


    /*touch slider*/
    let initialPoint;
    let finalPoint;
    wrap.addEventListener('touchstart', function (event) {
        initialPoint = event.changedTouches[0];
    }, false);
    wrap.addEventListener('touchend', function (event) {
        finalPoint = event.changedTouches[0];
        let xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
        if (xAbs > 20) {
            if (finalPoint.pageX < initialPoint.pageX) {
                moveSlider(arrELem, true);
            } else {
                moveSlider(arrELem, false);
            }
        }
    }, false);

};