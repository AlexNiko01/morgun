module.exports = (arrForm, popup, bg) => {
    let XMLHttpRequestPromise = require('xhr-promise');
    let popupSuccessful = document.querySelector('.send_successful');

    /*function encode data form*/
    function encode(wrap, name) {
        try {
            let data = wrap.querySelector(`[name=${name}]`).value;
            if (name !== 'price') {
                wrap.querySelector(`[name=${name}]`).value = "";
            }
            return encodeURIComponent(data);
        } catch (err) {
            return encodeURIComponent(defTown.innerText);
        }
    }


    for (let i = 0; i < arrForm.length; i++) {
        let xhrPromise = new XMLHttpRequestPromise();
        arrForm[i].addEventListener('submit', function (subEL) {
            subEL.preventDefault();
            /*remove popup*/
            popup.classList.remove('active');
            bg.classList.remove('active');

            /*get ang send data*/
            let dataForm = `name=${encode(this, 'name')}&email=${encode(this, 'email')}&phone=${encode(this, 'phone')}&text=${encode(this, 'text')}`;
            popupSuccessful.classList.add('active');

            xhrPromise.send({
                method: 'POST',
                url: 'https://form.morgun.ua/form.php',
                data: dataForm
            })
                .then(function (results) {
                    if (results.status !== 200) {
                        throw new Error('request failed');
                    }
                    console.log(results);
                    popupSuccessful.classList.add('active');
                    setTimeout(() => {
                        popupSuccessful.classList.remove('active');
                    }, 4000)
                })
                .catch(function (e) {
                    console.error(e, 'XHR error');
                });

        })
    }

};