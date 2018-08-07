module.exports = (arrSearch) => {
    for (let i = 0; i < arrSearch.length; i++) {

        const input = arrSearch[i].querySelector('input');
        const btn = arrSearch[i].querySelector('.btn_search');

        input.addEventListener('focus', function () {
            arrSearch[i].classList.add('focus');
        });
        input.addEventListener('blur', function () {
            if (this.value.length === 0) {
                arrSearch[i].classList.remove('focus');
            }
        });


        btn.addEventListener('click', (even) => {
            if (input.value.length === 0) {
                even.preventDefault();
                arrSearch[i].classList.remove('focus');
            }
            input.focus();
        });
    }
};