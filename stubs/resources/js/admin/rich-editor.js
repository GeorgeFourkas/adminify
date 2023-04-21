import Editor from "./CKEditor/ckeditor";

const locales = JSON.parse(document.querySelector('#tabExample').dataset.locales);
locales.forEach((locale) => {
    Editor
        .create(document.querySelector('#body-' + locale), {})
        .catch(error => {
            console.error(error);
        });
})

