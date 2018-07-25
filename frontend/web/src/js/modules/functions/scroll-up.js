module.exports = function (st) {
    let nom = window.pageYOffset;

    function animate(draw, duration) {
        requestAnimationFrame(function animate(time) {
            duration -= st;
            draw();
            if (0 < duration) {
                requestAnimationFrame(animate);
            }
        });
    }

    animate(function () {
        window.scrollBy(0, -st);
    }, nom);

};
