const forms = document.querySelectorAll('.permissions-form');
forms.forEach((form) => {
    const toggles = form.querySelectorAll('input[type=checkbox]')
    toggles.forEach((toggle) => {
        toggle.addEventListener('change', () => {
            form.submit();
        })
    })
})
