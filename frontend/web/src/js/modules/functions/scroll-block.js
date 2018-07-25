let del = 0;
let start = 0;

function percentages(step, row) {
    return Math.round(row / (step / 100));
}

module.exports = (block, scroll) => {


    let min = block.getBoundingClientRect().top - window.innerHeight * .8;
    let max = block.getBoundingClientRect().bottom - window.innerHeight * .8;
    let step = min - max;
    let boll = (min > 0 && max < 0 || min < 0 && max > 0 );


    if (del < scroll && boll) {
        start = percentages(step, min);

    } else if (del > scroll && boll) {
        start = percentages(step, min);
    }
    del = scroll;

    return start;


};