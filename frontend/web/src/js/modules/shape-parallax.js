const scrollBlock = require('./functions/scroll-block');

module.exports = (block, arrLine, scroll) => {

    let percentages = scrollBlock(block, scroll);

    for (let i = 0; i < arrLine.length; i++) {
        arrLine[i].style.transform = `translate3d(0,${percentages}%,0)`
    }


};