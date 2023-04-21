const btn = document.getElementById('upload_new_media');
const uploadMediaModal = document.getElementById('upload_media_modal')
btn.addEventListener('click', () => {
    uploadMediaModal.classList.toggle('hidden')
    document.querySelector('body').classList.toggle('overflow-hidden')
})

uploadMediaModal.addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        uploadMediaModal.classList.toggle('hidden');
        document.querySelector('body').classList.toggle('overflow-hidden')
    }
})
