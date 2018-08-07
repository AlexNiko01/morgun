module.exports = (arrTable) => {
    const parentElement = require('./functions/parentElement');
    const xhrPromise = new (require('xhr-promise'))();
    const csrf = document.querySelector('[name="csrf-token"]').content;

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

    function controlTableElem(wrap) {
        const tableElemControl = wrap.querySelectorAll('.btn_control_table');
        const wrapList = wrap.querySelector('.wrap_control_table');

        const url = wrapList.getAttribute('data-url');
        for (let i = 0; i < tableElemControl.length; i++) {

            tableElemControl[i].addEventListener('click', function (even) {
                even.preventDefault();
                let elementTable = parentElement(tableElemControl[i], 'tableRow');
                let type = tableElemControl[i].getAttribute('data-type');
                let id = elementTable.getAttribute('data-id');
                let typeStatus = type;

                if (elementTable.classList.contains('processed')) {
                    typeStatus = 'unblock';
                }

                let objType = {
                    id: id,
                    type: typeStatus
                };

                console.log(objType, `${url}/${type}`);
                xhrPromise.send({
                    method: 'POST',
                    url: `${url}/${type}`,
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
                        stateChange(wrapList, elementTable, type);

                    })
                    .catch(function (e) {
                        console.error('XHR error');
                    });
            });
        }
    }

    for (let i = 0; i < arrTable.length; i++) {
        const arrControl = arrTable[i].querySelectorAll('.table_control');
        controlTableElem(arrTable[i]);

        for (let t = 0; t < arrControl.length; t++) {
            let tableRow = arrControl[t].parentElement.parentElement;
            if (tableRow.classList.contains('tableRow')) {
                tableRow.addEventListener('mouseenter', () => {
                    tableRow.classList.add('hover');
                    arrControl[t].style.width = `${tableRow.clientWidth}px`;
                });
                tableRow.addEventListener('mouseleave', () => {
                    tableRow.classList.remove('hover');
                    arrControl[t].removeAttribute('style');
                });
            }
        }
    }
}
;