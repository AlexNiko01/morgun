module.exports = (arrWrap) => {
    const previewPhoto = require('./functions/previewPhoto');
    const popupWarning = document.getElementById('popup_warning');
    const hiddenScroll = require('./functions/hiddenScroll');

    for (let i = 0; i < arrWrap.length; i++) {
        const previewSet = arrWrap[i].querySelector('.previewSet');
        const previewResult = arrWrap[i].querySelector('.previewResult');
        const alt = arrWrap[i].querySelector('.imgAlt');
        const imgNameData = arrWrap[i].querySelector('.img_name_data');

        previewSet.addEventListener('change', function () {
            previewPhoto(this, previewResult, imgNameData, popupWarning, hiddenScroll, alt || false);
        });

        if (previewResult.classList.contains('img_true')) {
            previewSet.parentElement.querySelector('.text_file_upload').innerHTML = "Изменить";
        }
    }


};