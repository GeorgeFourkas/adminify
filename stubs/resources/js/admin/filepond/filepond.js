import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFilePoster from 'filepond-plugin-file-poster';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import 'filepond-plugin-file-poster/dist/filepond-plugin-file-poster.min.css';

const inputElements = document.querySelectorAll('[pond]')
const csrfToken = document.querySelector('meta[name="_token"]').content

FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFilePoster);

inputElements.forEach((inputElement) => {
    const posters = [];
    const form = inputElement.form;
    const container = inputElement.parentElement;
    const loader = container.querySelector('[pond_loader]')
    const submitBtn = form.querySelector('[type="submit"]')
    const alreadyUploadedFilesTogler = container.querySelector('[media_panel_toggler]')
    const alreadyUploadedFilesLoaded = container.querySelector('[already_uploaded_loader]')

    parseExistingFiles(inputElement, posters);

    const pond = FilePond.create(inputElement, {
        filePosterMinHeight: 44,
        filePosterMaxHeight: 256,
        credits: false,
        files: setUpFilesProp(posters),
        stylePanelLayout: inputElement.hasAttribute('circular') ? 'compact circle' : '',
        server: {
            url: '/',
            process: 'upload/media/async',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            load: '',
        }
    });
    pond.on("init", () => {
        container.querySelector('.filepond--root').classList.remove('hidden');
        loader.classList.add('hidden')
        alreadyUploadedFilesLoaded.classList.add('hidden')
        alreadyUploadedFilesTogler.classList.remove('hidden')
    })

    pond.on('addfilestart', () => {
        submitBtn.disabled = true;
        submitBtn.classList.remove('gradient-app-theme');
        submitBtn.classList.add('cursor-wait');
        submitBtn.classList.add('bg-gray-200');
    })

    pond.on('processfiles', () => {
        submitBtn.disabled = false;
        submitBtn.classList.remove('bg-gray-200');
        submitBtn.classList.remove('cursor-wait');
        submitBtn.classList.add('gradient-app-theme');
    })
})

function parseExistingFiles(inputElement, posters) {
    const arr = JSON.parse(inputElement?.getAttribute('previews'))
    if (Array.isArray(arr)) {
        arr.forEach((ind) => {
            if (Array.isArray(ind)) {
                ind.forEach((sub) => posters.push(sub))
            } else {
                posters.push(ind)
            }
        });
    }
}

function setUpFilesProp(posters) {
    let files = [];

    posters.forEach((poster) => {
        files.push({
            source: JSON.stringify(poster),
            options: {

                type: 'local',
                file: {
                    name: poster.name,
                    type: 'image/png',
                },
                metadata: {
                    poster: poster.url,
                    model: poster
                },
            },
        });
    });

    return files;
}
