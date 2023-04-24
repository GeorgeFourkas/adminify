const flashDiv = document.getElementById('flash-container');
if (flashDiv) {
    setTimeout(() => {
            flashDiv.classList.add('hidden');
            flashDiv.addEventListener('transitionend', () => {
                flashDiv.remove();
            })
        },
        5000)
}
