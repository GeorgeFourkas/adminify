import axios from 'axios'
import * as FilePond from 'filepond';

const togglers = document.querySelectorAll('[media_panel_toggler]')
const modal = document.querySelector('[overlay]')
const closeModalBtn = document.getElementById('close_btn');
const galleryContainer = document.querySelector('[image-grid-container]');
const whiteCard = document.querySelector('[modal_white_card]')
const initialUrl = '/master/admin/media/get'
let dropzoneReference = '';
let currentPage;
let lastPage;
let requesting = false;
let nextPageUrl = '';

closeModalBtn.addEventListener('click', () => {
    closeModal();
})
togglers.forEach((toggler) => {
    toggler.addEventListener('click', (e) => {
        dropzoneReference = e.target.closest('[pond_container]')
        modal.classList.toggle('hidden')
        document.querySelector('body').classList.toggle('overflow-y-hidden')
    })
})


modal.addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        closeModal();
    }
})
requesting = true;
axios.get(initialUrl).then((response) => {
    response.data.data.forEach((media) => {
        drawImage(media)
    })
    lastPage = response.data.last_page;
    currentPage = response.data.current_page;
    setListeners();
    nextPageUrl = response.data.next_page_url;
    requesting = false;


    whiteCard.addEventListener('scroll', () => {
        if (shouldRequestNewImages() && lastPage !== currentPage && !requesting) {
            requesting = true;
            axios.get(nextPageUrl).then((resp) => {
                resp.data.data.forEach((media) => {
                    drawImage(media)
                })
                lastPage = resp.data.last_page;
                currentPage = resp.data.current_page;
                setListeners();
                nextPageUrl = resp.data.next_page_url;
                requesting = false;
            })
        }
    })
})


function closeModal() {
    if (!modal.classList.contains('hidden')) {
        modal.classList.add('hidden')
        document.querySelector('body').classList.toggle('overflow-y-hidden')
    }
}

function drawImage(media) {
    const model = JSON.stringify(media);
    galleryContainer.insertAdjacentHTML('beforeend', `
                <img uploaded_media data-model='[${model}]' src="${media.url}" class="cursor-pointer" class="w-full rounded" data-id=${media.id} alt="">
           `)
}

function shouldRequestNewImages() {
    return whiteCard.scrollTop === (whiteCard.scrollHeight - whiteCard.offsetHeight)
}


function setListeners() {
    document.querySelectorAll('[uploaded_media]').forEach((media) => {
        media.addEventListener('click', (e) => {
            let pond = FilePond.find(dropzoneReference.querySelector('.filepond--root'));


            pond.files = pond.allowMultiple
                ? pond.getFiles().concat(transformMediaToFilepondObject(media))
                : transformMediaToFilepondObject(media);


            closeModal();
        })
    })
}

function transformMediaToFilepondObject(selectedMedia) {
    return [
        {
            source: selectedMedia.dataset.model,
            options: {
                type: 'local',
                file: {
                    name: selectedMedia.src,
                    type: 'image/png',
                },
                metadata: {
                    poster: selectedMedia.src,
                },
            },
        }
    ]
}

