module.exports = (dataElem, setElem, setInputName, popupWarning, hiddenScroll, alt) => {
    const maxFileSize = 3 * 1024 * 1024;
    const file = dataElem.files[0];

    function preview(file) {
        let nameFile = file.name;
        let reader = new FileReader();

        reader.addEventListener('load', function (event) {
            setInputName.value = nameFile;

            setElem.setAttribute('src', event.target.result);
        });
        reader.readAsDataURL(file);

        if (alt) {
            alt.value = nameFile.slice(0, nameFile.lastIndexOf('.'));
            alt.parentElement.classList.add('focus');
        }
        dataElem.parentElement.querySelector('.text_file_upload').innerHTML = "Изменить";
    }

    try {
        if (!file.type.match(/(jpeg|jpg|png|pdf|gif)/)) {
            popupWarning.querySelector('.popup_info_text').innerHTML =
                `<p>Фотография должна быть в формате jpg, png, pdf или gif</p>`;

            hiddenScroll(true, popupWarning);

            popupWarning.classList.add('active');
        } else if (file.size > maxFileSize) {
            popupWarning.querySelector('.popup_info_text').innerHTML =
                `<p>Размер фотографии не должен превышать 3 Мб</p>`;

            hiddenScroll(true, popupWarning);

            popupWarning.classList.add('active');
        } else {
            preview(file);
        }
    } catch (e) {
        console.log('Отмена добавление файла.')
    }

};