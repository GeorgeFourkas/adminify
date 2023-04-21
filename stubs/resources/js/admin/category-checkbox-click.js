const checkBoxContainers = document.querySelectorAll('[category-checkbox]')
checkBoxContainers.forEach((container) => {
    container.addEventListener('click', (e) => {
        const checkBox = container.querySelector('input[type=checkbox]')
        if (e.target === checkBox) {
            return;
        }
        checkBox.checked = !checkBox.checked
    })
})
