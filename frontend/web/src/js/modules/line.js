module.exports = () => {
    let del = 0;
    let start = true;
    let allLength = 0;
    let arrProm = [];

    class elem {
        constructor(dom, val) {
            this.value = val;
            this.link = dom;
        }
    }

    function moveLine(arr, boll) {
        start = boll;
        let lengthArr = arr.length;
        if (boll) {
            for (let i = 0; i < lengthArr; i++) {
                let trans = getComputedStyle(arr[0].link).transition.split(' ')[1].slice(0, -1) * 1000;
                setTimeout(() => {
                    arr[i].link.style.strokeDashoffset = 0;
                }, i * trans);
            }
        }
        else {
            for (let i = lengthArr - 1; i >= 0; i--) {
                let trans = getComputedStyle(arr[0].link).transition.split(' ')[1].slice(0, -1) * 1000;
                setTimeout(() => {
                    arr[i].link.style.strokeDashoffset = `${arr[i].value}`;
                }, (lengthArr - i) * trans);
            }
        }
    }


    return function (arrLine, block, scroll) {

        let min = block.getBoundingClientRect().top - window.innerHeight * .5;

        if (!allLength) {
            for (let i = 0; i < arrLine.length; i++) {
                let valLength = arrLine[i].getTotalLength();
                arrLine[i].style.strokeDasharray = `${valLength},${valLength}`;
                arrLine[i].style.strokeDashoffset = valLength;
                arrLine[i].style.transition = '.5s';
                allLength += valLength;
                arrProm.push(new elem(arrLine[i], valLength));
            }
        }

        if (del < scroll && min < 0) {
            if (start) {
                moveLine(arrProm, true);
                start = false;
            }

        } else if (del > scroll && min > 0) {
            if (!start) {
                moveLine(arrProm, false);
                start = true;
            }

        }
        del = scroll;

    }

};
