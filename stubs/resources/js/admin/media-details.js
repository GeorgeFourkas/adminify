const modal = document.getElementById('media_details_modal');
const images = document.querySelectorAll('[gallery_image]');
const imagePreview = document.getElementById('preview')
const mediaDeletionForm = document.querySelector('[remove_media_btn]')

const uploadedBySpan = document.getElementById('uploaded_by');
const uploadedAtSpan = document.getElementById('uploaded_at');
const originalFileNameSpan = document.getElementById('original_file_name')
const fileExtensionSpan = document.getElementById('file_extension')
const sizeSpan = document.getElementById('size')
const aspectRationSpan = document.getElementById('aspect_ratio')
const widthSpan = document.getElementById('width')
const heightSpan = document.getElementById('height')
const urlSpan = document.getElementById('url')

urlSpan.addEventListener('click', () => {
    navigator.clipboard.writeText(urlSpan.textContent)
})

images.forEach((image) => {
    const deletionRoute = JSON.parse(image.dataset.route);
    const mediaModel = JSON.parse(image.dataset.model);
    image.addEventListener('click', () => {
        uploadedBySpan.textContent = mediaModel.uploader?.name ?? '(not defined)';
        uploadedAtSpan.textContent = new Date(mediaModel.created_at).toISOString().slice(0, 10).split('-').reverse().join('/') ?? '';
        originalFileNameSpan.textContent = mediaModel.original_name ?? '';
        fileExtensionSpan.textContent = mediaModel.extension ?? '';
        sizeSpan.textContent = Math.round(mediaModel.size / 1024) ?? '';
        widthSpan.textContent = mediaModel.width;
        heightSpan.textContent = mediaModel.height;
        urlSpan.textContent = mediaModel.url
        mediaDeletionForm.action = deletionRoute;
        modal.classList.toggle('hidden');
        imagePreview.src = image.querySelector('img').src;
    })
    image.dataset.route = ''
    image.dataset.model = ''
})


modal.addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        modal.classList.toggle('hidden')
    }
})
