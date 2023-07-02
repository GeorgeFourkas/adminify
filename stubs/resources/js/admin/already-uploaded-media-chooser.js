import axios from 'axios'
import {appendLocale} from "./locale-prefix-parser";
import {applyRemoveListener} from "./remove-media-on-click-multiple-dropzone.js";

const togglers = document.querySelectorAll('[media_panel_toggler]')
const modal = document.querySelector('[overlay]')
const closeModalBtn = document.getElementById('close_btn');
const galleryContainer = document.querySelector('[image-grid-container]');
const whiteCard = document.querySelector('[modal_white_card]')
const firstUrl = appendLocale() + 'master/admin/media/get'

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
        dropzoneReference = (e.target.closest('[dropzone]'))

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
axios.get(firstUrl).then((response) => {
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
    galleryContainer.insertAdjacentHTML('beforeend', `
                <img uploaded_media src="${media.url}" class="cursor-pointer" class="w-full rounded" data-id=${media.id} alt="">
           `)
}

function shouldRequestNewImages() {
    const modal_scrollTop = whiteCard.scrollTop;
    const modal_scrollHeight = whiteCard.scrollHeight;
    const modal_innerHeight = getInnerHeight(whiteCard);
    return (modal_scrollTop + modal_innerHeight >= (modal_scrollHeight - 150))
}

function getInnerHeight(elm) {
    let computed = getComputedStyle(elm);
    let padding = parseInt(computed.paddingTop) + parseInt(computed.paddingBottom);

    return elm.clientHeight - padding
}

function setListeners() {
    document.querySelectorAll('[uploaded_media]').forEach((media) => {
        media.addEventListener('click', () => {
            const fileInput = dropzoneReference.querySelector('input[type="file"]')
            if (fileInput.hasAttribute('multiple')) {
                const gallery = dropzoneReference.querySelector('[uploaded_media_gallery]')
                gallery.insertAdjacentHTML('beforeend', `
                        <div class="relative group" already_uploaded_media data-media_id="${media.dataset.id}">
                             <img src="${media.src}" class="h-full w-full object-cover" alt="">
                             <div class="w-full h-full opacity-60 bg-[rgba(0,0,0,0.9)] hidden group-hover:block absolute top-0 left-0">
                                <div class="flex h-full items-center justify-center">
                                    <div class="rounded-full p-3 hover:bg-gray-400">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                      </svg>
                                    </div>
                                </div>
                             </div>
                        </div>
                `)
                const clonedInput = fileInput.cloneNode(true);
                clonedInput.type = 'text';


                clonedInput.name = fileInput.hasAttribute('already_uploaded_media_field_name')
                    ? fileInput.getAttribute('already_uploaded_media_field_name')
                    : "already_uploaded[]"

                clonedInput.setAttribute('media_id', media.dataset.id)
                clonedInput.value = media.dataset.id;
                fileInput.closest('form').appendChild(clonedInput)
                closeModal();
                applyRemoveListener(dropzoneReference, clonedInput)

            } else {
                dropzoneReference.querySelector('label').style.backgroundImage = `url(${media.src})`
                dropzoneReference.querySelector('[dropzone_remove_btn]').classList.remove('hidden')
                fileInput.type = 'text';
                fileInput.value = media.dataset.id;
                closeModal();
                applyRemoveListener(dropzoneReference, '')
            }

        })
    })
}

