module.exports = (slider, wrap) => {
    window.addEventListener('load', () => {
        let step = 0;
        let yak = true;
        let sliderPercent = slider.clientWidth / 100;
        let leftMove = wrap.clientWidth / sliderPercent - 100;

        function animate() {

            requestAnimationFrame(function animate() {
                sliderPercent = slider.clientWidth / 100;
                leftMove = wrap.clientWidth / sliderPercent - 100;

                wrap.style.transform = `translate3d(-${step}%,0,0)`;

                if (step <= 0) {
                    yak = true;
                } else if (step > leftMove) {
                    yak = false;
                }
                step += (yak) ? .02 : -.02;

                requestAnimationFrame(animate);
            });
        }

        if (slider.clientWidth < wrap.clientWidth) {
            animate();
        } else {
            wrap.classList.add('small');
        }


    });
};