module.exports = (arrCropperWrap) => {

    const Cropper = require('cropperjs').default;
    let globalImg = null, globalValue = null, cropper = null;


    document.body.lastElementChild.insertAdjacentHTML('beforeBegin',
        `<div class="cropper_popup" id="cropperPopup">
            <div class="cropper_popup_wrap">
                <img src="">
            </div>
            <button class="btn cropper_popup_save"><span>Сохранить</span><i></i></button>
        </div>`);

    const popupCropper = document.getElementById('cropperPopup');
    const popupCropperWrap = document.querySelector('.cropper_popup_wrap');
    const btnSave = document.querySelector('.cropper_popup_save');

    for (let i = 0; i < arrCropperWrap.length; i++) {
        const touchElem = arrCropperWrap[i].querySelector('.cropper_change_img');

        touchElem.addEventListener('click', function (even) {
            even.preventDefault();
            globalImg = this.querySelector('img');
            globalValue = this.parentElement.querySelector('.img_result_data');


            const sizeImgWidth = this.getAttribute('data-width');
            const sizeImgHeight = this.getAttribute('data-height');
            const sizeImg = (sizeImgWidth && sizeImgHeight) ? sizeImgWidth / sizeImgHeight : 16 / 9;

            let image = document.createElement('img');
            let urlImg = globalImg.getAttribute('src');
            image.setAttribute('src', `${urlImg}`);

            popupCropperWrap.innerHTML = '';
            popupCropperWrap.appendChild(image);
            popupCropper.classList.add('active');

            cropper = new Cropper(image, {
                aspectRatio: `${sizeImg}`,
                modal: true,
                zoomOnTouch: true,
                autoCrop: true,
                getData: true
            });
        })
    }


    btnSave.addEventListener('click', function (even) {
        even.preventDefault();
        popupCropper.classList.remove('active');
        cropper.crop();

        cropper.getCroppedCanvas().toBlob((blob) => {
            let formData = new FormData();
            formData.append('croppedImage', blob);

            let reader = new window.FileReader();
            reader.readAsDataURL(blob);
            reader.addEventListener('load', () => {
                globalImg.setAttribute('src', `${reader.result}`);
                globalValue.value = `${reader.result}`;
            });

        });
    });

    /*key slider*/
    document.addEventListener('keyup', (e) => {
        if (e.keyCode === 27) {
            popupCropper.classList.remove('active');
        }
    });


};