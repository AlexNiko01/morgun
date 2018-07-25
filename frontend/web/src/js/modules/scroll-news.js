module.exports = (arrBlock) => {

    for (let i = 0; i < arrBlock.length; i++) {
        let wrapScroll = arrBlock[i].querySelector('.range_slider>input');
        let wrap = arrBlock[i].querySelector('.news_min_text_wrap');

        if (wrap.clientHeight < wrap.scrollHeight) {

            wrapScroll.addEventListener('input', function () {
                wrap.scrollTop = this.value * ((wrap.scrollHeight - wrap.offsetHeight) / 100);
            });
            wrap.addEventListener('scroll', function () {
                wrapScroll.value = Math.floor(wrap.scrollTop * 100 / (wrap.scrollHeight - wrap.offsetHeight));
            })
        } else {
            arrBlock[i].querySelector('.range_slider').style.display = 'none';
        }

    }


};