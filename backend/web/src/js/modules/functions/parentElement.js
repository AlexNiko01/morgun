module.exports = (elem, className) => {
    let result = elem;

    for (let i = 0; i < 50; i++) {
        if (result.classList.contains(className)) {
            return result;
        } else {
            result = result.parentElement;
        }
    }
    return null;
};