module.exports = (menuUser) => {
    const menuOpen = menuUser.querySelector('.btn_user');
    const bgClose = document.querySelector('.bg_close');

    menuOpen.addEventListener('click', () => {
        if (menuUser.classList.toggle('active')) {
            bgClose.classList.add('active');
        } else {
            bgClose.classList.remove('active');
        }
    });

    bgClose.addEventListener('click', () => {
        menuUser.classList.remove('active');
        bgClose.classList.remove('active');
    });
};