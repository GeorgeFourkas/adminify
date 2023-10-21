
import Editor from "../admin/CKEditor/ckeditor.js";
const elements = document.querySelectorAll('[ckeditor]');
elements.forEach((container) => {
    const element = container.querySelector("textarea");
    Editor.create(element).then(() => container.querySelector('[ckeditor_loader]').classList.add('hidden'));
})
