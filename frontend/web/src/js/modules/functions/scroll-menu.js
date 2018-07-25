module.exports = function (head) {
    let yak = 1;
    document.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            head.classList.add('active');
            if (yak) {
                setTimeout(() => {
                    head.classList.add('top_head');
                    yak = 0;
                }, 100)
            }
        } else {
            head.classList.remove('active', 'top_head');
            yak = 1;
        }
    });
};
