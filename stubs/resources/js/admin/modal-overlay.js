const overlays = document.querySelectorAll('[modal_overlay]')

overlays.forEach((overlay) => {
    overlay.addEventListener('click', (e) => {
        if (e.target === e.currentTarget) {
            overlay.classList.add('hidden');
        }
    });
    overlay.querySelectorAll('[close_button]').forEach((closeBtn) => {
        closeBtn.addEventListener('click', () => {
            overlay.classList.add('hidden');
        })
    })
});


const togglers = document.querySelectorAll('[modal_trigger]')
togglers.forEach((toggler) => {
    const targetElement = document.querySelector(toggler.getAttribute('modal_trigger_for'));
    toggler.addEventListener('click', () => {
        targetElement.classList.remove('hidden')
    })
})
