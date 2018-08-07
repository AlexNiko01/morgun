module.exports = (arr) => {

    for (let i = 0; i < arr.length; i++) {

        const input = arr[i].querySelector('.input_field');
        const placeholder = arr[i].querySelector('.placeholder');

        try {


            if (input.value.length > 0) {
                arr[i].classList.add('focus');
            }

            input.addEventListener('focus', function () {
                arr[i].classList.add('focus');
            });

            input.addEventListener('blur', function () {
                if (this.value.length === 0) {
                    arr[i].classList.remove('focus');
                }
            });

            placeholder.addEventListener('click', function () {
                arr[i].parentElement.classList.add('focus');
                input.focus();
            });
        } catch (e) {
        }
    }
};