const fileDom = []
const dropzones = (document.querySelectorAll('.dropzone-handler'))


const previewInitialUploadededAsset = (index) => {
    fileDom[index].preview.style.backgroundImage = 'url(' + fileDom[index].preview.dataset.asset + ')';
    fileDom[index].labelText1.classList.toggle('text-white')
}
const previewSelectedImage = (e, index) => {
    fileDom[index].preview.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')';
    fileDom[index].preview.onload = function () {
        URL.revokeObjectURL(fileDom[index].preview.src)
    }
}
const isUpdatingData = (index) => {
    return !!fileDom[index].preview.dataset.asset
}
const noFileSelected = (index) => {
    return fileDom[index].dropzone.files.length === 0
}
const setPreviewToEmpty = (index) => {
    fileDom[index].preview.style.backgroundImage = 'url()';
    fileDom[index].dropzone.value = '';
}
const togglePreviewControls = (index) => {
    fileDom[index].labelText1.classList.toggle('text-white')
    fileDom[index].removeImageBtn.classList.toggle('hidden')
}

dropzones.forEach((locale) => {
    const id = locale.dataset.children_id
    fileDom.push({
        dropzone: document.querySelector('#dropzone-file-' + id),
        preview: document.querySelector('#preview-' + id),
        labels: document.querySelector('#labels-' + id),
        labelText1: document.querySelector('#label-text-1-' + id),
        removeImageBtn: document.querySelector('#removeImage-' + id),
    })
})


fileDom.forEach((item, index) => {
    if (isUpdatingData(index)) {
        previewInitialUploadededAsset(index)
    }
    item.dropzone.addEventListener('change', (e) => {
        if (e.target.files[0]) {
            previewSelectedImage(e, index)
            togglePreviewControls(index)
        } else if (isUpdatingData(index) && noFileSelected(index)) {
            previewInitialUploadededAsset(index)
        } else {
            togglePreviewControls(index)
        }
    });
    item.removeImageBtn.addEventListener('click', (e) => {
        e.preventDefault()
        if (isUpdatingData(index) && noFileSelected(index)) {
            previewInitialUploadededAsset(index);
        } else {
            setPreviewToEmpty(index)
        }
    });
})

