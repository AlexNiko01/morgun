module.exports = (block, header) => {

    let top = block.getBoundingClientRect().top;

    if (top > 0) {
        animatePlus(block);
    } else if (top < 0) {
        animateMinus(block);
    }

    function animatePlus(block) {
        let timeMove = 50;
        requestAnimationFrame(function animate() {
            let scrollTest = Math.floor(window.pageYOffset);
            window.scrollBy(0, timeMove += 3);
            let scrollStop = Math.floor(window.pageYOffset);
            if (0 < block.getBoundingClientRect().top - header.clientHeight && scrollTest !== scrollStop) {
                requestAnimationFrame(animate);
            }
            else {
                window.scrollBy(0, (block.getBoundingClientRect().top - header.clientHeight));
            }
        });
    }

    function animateMinus(block) {
        let timeMove = 50;
        requestAnimationFrame(function animate() {
            window.scrollBy(0, -(timeMove += 3));
            if (0 > block.getBoundingClientRect().top - header.clientHeight && window.pageYOffset !== 0) {
                requestAnimationFrame(animate);
            }
            else {
                window.scrollBy(0, (block.getBoundingClientRect().top - header.clientHeight));
            }
        });
    }
};