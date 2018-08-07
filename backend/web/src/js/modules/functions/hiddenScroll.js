module.exports = (boll, elem) => {

    if (boll) {
        let scrollWidth = window.innerWidth - document.body.clientWidth;
        document.body.style.cssText = `overflow:hidden; padding-right:${scrollWidth}px`;
        if (elem && elem.length) {
            for (let i = 0; i < elem.length; i++) {
                elem[i].style.width = `${elem[i].clientWidth - scrollWidth}px`;
            }
        } else if (elem) {
            elem.style.width = `${elem.clientWidth - scrollWidth}px`;
        }
    } else {
        document.body.removeAttribute('style');
        if (elem && elem.length) {
            for (let i = 0; i < elem.length; i++) {
                elem[i].removeAttribute('style');
            }
        } else if (elem) {
            elem.removeAttribute('style');
        }
    }
};