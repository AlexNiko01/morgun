module.exports = (arrReadonly) => {

    for (let i = 0; i < arrReadonly.length; i++) {
        const readonlyInput = arrReadonly[i].querySelector('.readonly_input');
        const readonlyBtn = arrReadonly[i].querySelector('.readonly_btn');

        readonlyBtn.addEventListener('click', (even) => {
            even.preventDefault();

            if (readonlyBtn.classList.toggle('active')) {
                readonlyInput.removeAttribute('readonly');
                readonlyInput.parentElement.classList.add('focus');
                readonlyInput.focus();
            } else {
                readonlyInput.setAttribute('readonly', 'readonly');
                // readonlyInput.parentElement.classList.remove('focus');
            }
        });

    }

};