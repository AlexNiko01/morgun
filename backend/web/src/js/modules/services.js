module.exports = (servicesElemBtn) => {
    const parentElement = require('./functions/parentElement');
    const xhrPromise = new (require('xhr-promise'))();
    const csrf = document.querySelector('[name="csrf-token"]').content;
    const arrServices = document.querySelectorAll('.services_elem');


    function removeActive(arr) {
        for (let i = 0; i < arr.length; i++) {
            arr[i].classList.remove('active');
        }
    }

    function stateChange(wrap, elem, type) {
        if (type === 'delete') {
            elem.classList.add('delete_opacity');
            setTimeout(() => {
                wrap.removeChild(elem);
            }, 500);

        } else if (type === 'block') {
            elem.classList.toggle('processed');
        }
    }


    for (let i = 0; i < servicesElemBtn.length; i++) {
        let type = servicesElemBtn[i].getAttribute('data-type');
        servicesElemBtn[i].addEventListener('click', function (even) {
            even.preventDefault();
            if (type === 'delete') {
                let parentWrap = parentElement(this, 'servicesWrap');
                let element = parentElement(this, 'servicesElem');
                let url = parentWrap.getAttribute('data-url');
                let idElem = element.getAttribute('data-id');

                let objType = {
                    id: idElem,
                    type: `${type}`
                };
                console.log(objType, `/${url}/${type}`);
                xhrPromise.send({
                    method: 'POST',
                    url: `/${url}/${type}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-Token': csrf
                    },
                    data: 'data=' + JSON.stringify(objType)
                })
                    .then(function (results) {
                        if (results.status !== 200) {
                            throw new Error('request failed');
                        }
                        stateChange(parentWrap, element, type);
                    })
                    .catch(function (e) {
                        console.error(e, 'XHR error');
                    });
            }
        })
    }

    for (let i = 0; i < arrServices.length; i++) {
        let btnOpen = arrServices[i].querySelector('.open_services');

        if (btnOpen !== null) {
            btnOpen.addEventListener('click', function (even) {
                even.preventDefault();

                if (arrServices[i].classList.contains('active')) {
                    removeActive(arrServices);
                } else {
                    removeActive(arrServices);
                    arrServices[i].classList.add('active');
                }
            });
        }
    }

};