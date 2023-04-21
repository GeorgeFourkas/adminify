const forms = document.querySelectorAll('[settings-form]')
forms?.forEach((form) => {
    form.querySelectorAll('input[type=checkbox]')?.forEach((input) => {
        input.addEventListener('change', () => {
            form.submit();
        })
    })


})
