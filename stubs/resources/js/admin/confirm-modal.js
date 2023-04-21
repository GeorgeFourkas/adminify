const forms = document.querySelectorAll('[deletion-form]')
const confirmation = document.getElementById('confirmation');
const cancel = document.getElementById('cancel');
const modal = document.getElementById('confirmation-modal')
const close = document.getElementById('close');

forms.forEach((form) => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        modal.classList.toggle('hidden')
        confirmation.addEventListener('click', () => {
            form.submit();
            modal.classList.add('hidden')
        })
        cancel.addEventListener('click', () => {
            modal.classList.add('hidden')
        })
        close.addEventListener('click', () => {
            modal.classList.add('hidden')
        })
        if (!modal.classList.contains('hidden')) {
            addEventListener('keydown', (e) => {
                if (e.key === "Escape" && !modal.classList.contains('hidden')) {
                    modal.classList.add("hidden")
                }
            }, false);

            addEventListener('keydown', (e) => {
                if (e.key === "Escape" && !modal.classList.contains('hidden')) {
                    modal.classList.add("hidden")
                }
            });
            modal.addEventListener('click', (e) => {
                if (e.target.id === 'confirmation-modal') {
                    modal.classList.add('hidden')
                }
            })
        }
    })
})


