module.exports = (popupArr) => {
    const hiddenScroll = require('./functions/hiddenScroll');

    for (let i = 0; i < popupArr.length; i++) {
        let close = popupArr[i].querySelector('.popup_info_close');
        let ok = popupArr[i].querySelector('.btn');

        close.addEventListener('click', () => {
            popupArr[i].classList.remove('active');

            hiddenScroll(false, popupArr[i]);
        });
        ok.addEventListener('click', () => {
            popupArr[i].classList.remove('active');

            hiddenScroll(false, popupArr[i]);
        });

    }
};