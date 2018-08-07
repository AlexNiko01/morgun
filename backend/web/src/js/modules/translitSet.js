module.exports = (arrSet, arrResult) => {

    const translit = require('./functions/translit');

    if (arrSet.length !== arrResult.length) {
        console.log('Не совпадает количество translit элементов!');
    }


    for (let i = 0; i < arrSet.length; i++) {
        try {

            let wrap = arrResult[i].parentElement;
            if (arrSet[i].value.length > 0) {
                arrResult[i].value = translit(arrSet[i].value);
            }
            arrSet[i].addEventListener('input', () => {
                arrResult[i].value = translit(arrSet[i].value);
                if (arrResult[i].value.length > 0 && wrap) {
                    wrap.classList.add('focus');
                } else {
                    wrap.classList.remove('focus');
                }
            });
        } catch (e) {
            console.log('проверте file translit.js', e);
        }

    }


};