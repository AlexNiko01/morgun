module.exports = (wrap) => {

    let sliderElem = wrap.querySelectorAll('.slider_edit_img');
    const wrapListElem = wrap.querySelector('.slider_edit_images');
    const slideTitle = wrap.querySelector('.slider_edit_content_title .data_title');
    const popupInfo = document.querySelector('.popup_info');
    const popupInfoText = document.querySelector('.popup_info .popup_info_text');
    const editor = wrap.querySelector('.editor_slider');
    const Quill = require('quill');


    /*Инициализация редактора*/
    const quillEditor = new Quill(editor, {
        modules: {
            toolbar: [
                [{'header': [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'link'],
                [{'list': 'ordered'}, {'list': 'bullet'}],
                ['clean']
            ],
        },
        placeholder: 'Пишите текст...',
        syntax: true,
        theme: 'snow',
    });
    const csrf = document.querySelector('[name="csrf-token"]').content;
    let activeTitle = null, activeText = null, activeStatus = null;
    const editorArea = wrap.querySelector('.ql-editor');
    const xhrPromise = new (require('xhr-promise'))();

    function setDataValue(elem) {

        activeTitle = elem.querySelector('.slide_data_title');
        activeText = elem.querySelector('.slide_data_text');
        activeStatus = elem.querySelector('.slide_data_status');

        slideTitle.value = activeTitle.value;
        editorArea.innerHTML = activeText.value;
    }

    function deleteElemSlide(elem, boll) {
        if (!boll) {
            wrapListElem.removeChild(elem);
        }

        let elemFirst = wrapListElem.querySelectorAll('.slider_edit_img');
        if (elemFirst.length > 0) {
            elemFirst[0].classList.add('active');
            activeTitle = elemFirst[0].querySelector('.slide_data_title');
            activeText = elemFirst[0].querySelector('.slide_data_text');
            activeStatus = elemFirst[0].querySelector('.slide_data_status');

            slideTitle.value = activeTitle.value;
            editorArea.innerHTML = activeText.value;
        } else {
            slideTitle.value = '';
            editorArea.innerHTML = '';
        }
    }

    function setStatusElem(elem) {
        let activeStatus = elem.querySelector('.slide_data_status');
        if (elem.getAttribute('data-id') !== null) {
            activeStatus.value = 'change';
        } else {
            activeStatus.value = 'new';
        }
    }

    function sendDeleteSlide(elem) {
        let delObg = {
            id: elem.getAttribute('data-id')
        };

        if (delObg['id'] !== null) {
            console.log('data=' + JSON.stringify(delObg));
            xhrPromise.send({
                method: 'POST',
                url: '/admin/gallery-item/delete',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-Token': csrf
                },
                data: 'data=' + JSON.stringify(delObg)
            })
                .then(function (results) {
                    if (results.status !== 200) {
                        throw new Error('request failed');
                    }
                    deleteElemSlide(elem);
                })
                .catch(function (e) {
                    console.error(e, 'XHR error');
                    popupInfo.classList.add('active');
                    popupInfoText.innerText = `${e}`;
                });
        } else {
            deleteElemSlide(elem);
        }
    }

    /*Добавляет событие на кнопки в элементе*/
    function setEventElem(elem) {
        const btnDel = elem.querySelector('.btn_delete_img');
        const btnChang = elem.querySelector('.btn_editing_img');
        const inputFile = elem.querySelector('.photo_slide');
        const elemImg = elem.querySelector('img');

        elem.addEventListener('click', (even) => {
            if (even.target.classList.contains('slider_edit_img')) {
                sliderElem = wrap.querySelectorAll('.slider_edit_img');
                for (let i = 0; i < sliderElem.length; i++) {
                    sliderElem[i].classList.remove('active');
                }
                elem.classList.add('active');
                setDataValue(elem);
            }
        });

        btnDel.addEventListener('click', function (even) {
            even.preventDefault();
            sendDeleteSlide(elem);
            setAttributeSlide(wrap.querySelectorAll('.slider_edit_img'));
        });
        btnChang.addEventListener('click', function (even) {
            even.preventDefault();
            inputFile.click();
        });
        photoTransform(btnChang, inputFile, elemImg, elem);
    }

    for (let i = 0; i < sliderElem.length; i++) {
        setEventElem(sliderElem[i]);
    }

    function photoTransform(btn, inputFile, setDataResult, elem) {
        inputFile.addEventListener('change', function () {
            if (this.files.length > 0) {
                let file = this.files[0];
                let reader = new FileReader();
                reader.addEventListener('load', function (even) {
                    setDataResult.setAttribute('src', `${even.target.result}`);
                    if (elem === sliderElem[sliderElem.length - 1]) {
                        addNewElemSlider();
                    }
                });
                reader.readAsDataURL(file);
                setStatusElem(elem);
            }
        });
    }

    function setAttributeSlide(arr) {
        for (let i = 0; i < arr.length; i++) {
            let photoSlide = arr[i].querySelector('.photo_slide');
            let slideDataStatus = arr[i].querySelector('.slide_data_status');
            let slideDataTitle = arr[i].querySelector('.slide_data_title');
            let slideDataText = arr[i].querySelector('.slide_data_text');

            if (photoSlide && slideDataStatus && slideDataTitle && slideDataText) {
                photoSlide.setAttribute('name', `UploadForm[imageFiles][${i}]`);
                slideDataStatus.setAttribute('name', `statusSlide[${i}]`);
                slideDataTitle.setAttribute('name', `titleSlide[${i}]`);
                slideDataText.setAttribute('name', `textSlide[${i}]`);
            } else {
                console.log('не все скрытые данный для отправки в слайде')
            }
        }
    }

    function addNewElemSlider() {
        let newElem = document.createElement('div');
        newElem.className = 'slider_edit_img';
        newElem.innerHTML = `<img src="" alt="">
                <div class="slider_img_control">
                    <button class="btn_dote btn_editing_img">
                       <i class="fa fa-pencil"></i>
                       <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn_dote btn_delete_img"><i class="fa fa-trash"></i></button>
                </div>
                <div class="slide_data_hidden">
                    <input type="file" class="photo_slide" value="" accept="image/*" name="UploadForm[imageFiles][-1]">
                    <input type="text" class="slide_data_status" name="statusSlide[-1]">
                    <input type="text" class="slide_data_title" name="titleSlide[-1]">
                    <textarea  class="slide_data_text" name="textSlide[-1]"></textarea>
                </div>`;
        setEventElem(newElem);
        wrapListElem.appendChild(newElem);
        deleteElemSlide(newElem, true);
        setAttributeSlide(wrap.querySelectorAll('.slider_edit_img'));
        sliderElem = wrap.querySelectorAll('.slider_edit_img');
    }


    /*мгновенное обновление title и textarea*/
    slideTitle.addEventListener('input', () => {
        activeTitle.value = slideTitle.value;
        if (activeStatus.value !== 'new') {
            activeStatus.value = 'changed';
        }
    });

    quillEditor.on('text-change', function () {
        activeText.value = editorArea.innerHTML;
        if (activeStatus.value !== 'new') {
            activeStatus.value = 'changed';
        }
    });

    if (sliderElem.length > 0) {
        sliderElem[0].classList.add('active');

        activeTitle = sliderElem[0].querySelector('.slide_data_title');
        activeText = sliderElem[0].querySelector('.slide_data_text');
        activeStatus = sliderElem[0].querySelector('.slide_data_status');

        slideTitle.value = activeTitle.value;
        editorArea.innerHTML = activeText.value;
    }
    /*Отпрака данных на сервер*/
    // wrap.addEventListener('submit', function (event) {
    //     event.preventDefault();
    //     // let sendData = {
    //     //     settings: getSettingsSlider(),
    //     //     sliders: arrElemObj,
    //     //     id: `${wrap.getAttribute('data-id')}`
    //     // };
    //     let myFormData = new FormData(wrap);
    //     xhrPromise.send({
    //         method: 'POST',
    //         url: 'store',
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded',
    //             'X-Requested-With': 'XMLHttpRequest',
    //             'X-CSRF-Token': csrf
    //         },
    //         data: myFormData
    //     })
    //         .then(function (results) {
    //             if (results.status !== 200) {
    //                 throw new Error('request failed');
    //             }
    //             console.log(results);
    //             popupInfo.classList.add('active');
    //             popupInfoText.innerText = 'Слайдер успешно сохранен!';
    //         })
    //         .catch(function (e) {
    //             console.error('XHR error');
    //             popupInfo.classList.add('active');
    //             popupInfoText.innerText = `${e}`;
    //         });
    // });
};