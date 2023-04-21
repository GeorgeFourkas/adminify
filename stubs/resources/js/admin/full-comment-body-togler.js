const bodies = document.querySelectorAll('.comment-body');
bodies.forEach((body, index, array) => {
    const el = body.querySelector('p');
    const originalValue = el.textContent;
    el.textContent = el.textContent.substring(0, 50) + '...'
    body.addEventListener('click', () => {
        if (body.classList.contains('whitespace-nowrap')) {
            body.classList.remove('whitespace-nowrap')
            body.classList.add('whitespace-normal')
            body.classList.add('max-w-md')
            body.parentElement.classList.toggle('bg-yellow-50')
            body.parentElement.classList.remove('hover:bg-gray-50')
            el.textContent = originalValue;
            array.forEach((item, id) => {
                if (id !== index) {
                    item.classList.add('whitespace-nowrap')
                    item.classList.remove('whitespace-normal')
                    item.classList.remove('max-w-md')
                    item.querySelector('p').textContent = item.querySelector('p').textContent.substring(0, 50);
                    item.parentElement.classList.remove('bg-yellow-50')

                }
            })
        } else {
            body.classList.add('whitespace-nowrap')
            body.classList.remove('whitespace-normal')
            body.classList.remove('max-w-md')
            body.parentElement.classList.remove('bg-yellow-50')
            body.parentElement.classList.add('hover:bg-gray-50')
            el.textContent = el.textContent.substring(0, 50) + '...';
        }


    })
})
