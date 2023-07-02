const dropzones = document.querySelectorAll('[dropzone]')
dropzones.forEach((dropzone) => {
    applyRemoveListener(dropzone)
    const input = dropzone.querySelector('input');
    if (input.hasAttribute('multiple')) {
        handleMultiple(dropzone, input);
    } else {
        handleSingle(dropzone, input)
    }
    input.disabled = false;
})

function handleSingle(dropzone, input) {
    const preview = dropzone.querySelector('label')
    const removeBtn = dropzone.querySelector('[dropzone_remove_btn]');
    const isUpdatingModel = !!preview.dataset.asset

    dropzone.addEventListener('click', () => {
        if (input.type === 'text') {
            input.type = 'file'
        }
    });
    removeBtn.addEventListener('click', (e) => {
        e.preventDefault()
        removeBtn.classList.toggle('hidden')
        removeInputFileOrText(input.files ?? [], 1, input)
        isUpdatingModel
            ? preview.style.backgroundImage = 'url(' + preview.dataset.asset + ')'
            : preview.style.backgroundImage = 'url()';
    });
    preview.style.backgroundImage = 'url(' + preview.dataset.asset + ')';
    input.addEventListener('change', (e) => {
        preview.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')'
        // free memory
        preview.onload = function () {
            URL.revokeObjectURL(preview.src)
        }
        removeBtn.classList.remove('hidden')
    })
}

function handleMultiple(rootDropzoneContainer, fileInput) {
    fileInput.addEventListener('change', (e) => {
        const gallery = rootDropzoneContainer.querySelector('[uploaded_media_gallery]')
        applyRemoveListener(rootDropzoneContainer)
        const item = rootDropzoneContainer.querySelector('[already_uploaded_media]')
        Array.from(e.target.files).forEach((file) => {
            const cloned = item?.cloneNode(true);
            cloned.getElementsByTagName('img')[0].src = URL.createObjectURL(file);
            cloned.removeAttribute('data-model')
            cloned.classList.remove('hidden')
            gallery.appendChild(cloned)
            applyRemoveListener(rootDropzoneContainer);
        });
    });
}

function applyRemoveListener(rootElement) {
    rootElement.querySelectorAll('[already_uploaded_media]').forEach((media, key) => {
        media.addEventListener('click', (e) => {
            e.preventDefault()
            const input = rootElement.querySelector('input[type="file"]');
            removeInputFileOrText(input.files, parseInt(key) - 1, input);
            if (media.dataset.model) {
                const parent = media.closest('[dropzone]')
                parent.insertAdjacentHTML('afterbegin', `
                 <input type="text" class="hidden" name="${getInputName(input)}" value=${JSON.parse(media.dataset.model).id}>
`);
            }
            media.remove()
        })
    })
}

function getInputName(element) {

    if (element.hasAttribute('detach_media_field_name')) {
        return element.getAttribute('detach_media_field_name')
    }
    return `${element.name}[detach]`
}

function removeInputFileOrText(fileList, index, input) {

    if (input.type === 'text') {
        return input.value = '';
    }

    const filesArray = Array.from(fileList);
    filesArray.splice(index, 1);
    input.value = '';

    const newFileList = new DataTransfer();
    filesArray.forEach(file => newFileList.items.add(file));
    input.files = newFileList.files;
}
