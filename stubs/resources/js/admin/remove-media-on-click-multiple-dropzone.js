export function applyRemoveListener(dropzone, input) {
    document.querySelectorAll('[already_uploaded_media]').forEach((media, key) => {
        media.addEventListener('click', (e) => {
            e.preventDefault()
            if (media.dataset.model) {
                const parent = media.closest('[dropzone_multiple]')
                const fileInputElement = parent.querySelector('input[type="file"]')
                parent.insertAdjacentHTML('afterbegin', `
                 <input type="text" class="hidden" name="${getInputName(fileInputElement)}"  value=${JSON.parse(media.dataset.model).id}>
               `)
            }
            if (input && input !== '') {
                input.remove()
            }
            media.remove()
        });
    });
}

function getInputName(element) {

    return element.hasAttribute('detach_media_field_name')
        ? element.getAttribute('detach_media_field_name')
        : `${element.name}[detach]`
}
