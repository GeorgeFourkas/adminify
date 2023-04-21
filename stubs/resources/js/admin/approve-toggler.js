document
    .querySelectorAll('form[comment-approval]')
    .forEach((form) => {
        form.querySelector('input[type=checkbox]')
            .addEventListener('change', () => {
                form.submit()
            })
    })
