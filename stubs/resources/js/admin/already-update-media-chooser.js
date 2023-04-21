import axios from 'axios'
import {appendLocale} from "./locale-prefix-parser";
import tabs from "./tabs";

const togglers = document.querySelectorAll('[media_panel_toggler]')
const modal = document.querySelector('[overlay]')
const closeModalBtn = document.getElementById('close_btn');
const galleryContainer = document.querySelector('[image-grid-container]');
const whiteCard = document.querySelector('[modal_white_card]')
const firstUrl = appendLocale() + 'master/admin/media/get'
let currentPage;
let lastPage;
let requesting = false;
let nextPageUrl = '';


closeModalBtn.addEventListener('click', () => {
    closeModal();
})


togglers.forEach((toggler) => {
    toggler.addEventListener('click', () => {
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

            if (tabs._activeTab !== undefined) {
                const tabLocaleId = tabs.getActiveTab().id;
                const fileInput = document.getElementById(`dropzone-file-${tabLocaleId}`);
                const filePreview = document.getElementById(`preview-${tabLocaleId}`)
                filePreview.style.backgroundImage = `url(${media.src})`
                fileInput.type = 'text';
                fileInput.value = media.dataset.id;
                closeModal();
            } else {
                const dropzone = document.querySelector('[dropzone]');
                const fileInput = dropzone.querySelector('input[type=file]');
                const filePreview = document.querySelector('label')
                filePreview.style.backgroundImage = `url(${media.src})`
                fileInput.type = 'text';
                fileInput.value = media.dataset.id;
                closeModal();
            }
        })
    })
}
