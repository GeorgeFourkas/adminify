const modal = document.querySelector('[publish_lang]')
const languageBoxes = document.querySelectorAll('[registered-language-form]')
const input = document.getElementById('language_name')
const checkbox = document.getElementById('language_status')
const languageStatusForm = document.getElementById('change_language_status_form')
modal.querySelector('button').addEventListener('click', () => {
    modal.classList.toggle('hidden')
})


modal.addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        modal.classList.toggle('hidden');
    }
})

languageBoxes.forEach((box) => {
    box.addEventListener('click', (e) => {
        if (box.querySelector('[remove-lange-btn]').contains(e.target)) {
            return;
        }
        modal.classList.toggle('hidden')
        const localeData = JSON.parse(box.dataset.locale)

        const translatorLink = modal.querySelector('#translator_link');
        translatorLink.href = localeData?.translator_route

        checkbox.checked = localeData.published;
        input.value = localeData.name;
        const defaultLanguageElement = document.getElementById('change_default_language')
        const makeDefaultLanguageForm = defaultLanguageElement.querySelector('form');
        if (!localeData.default) {
            modal.querySelector('[default_langage_content]').classList.add('hidden')
            defaultLanguageElement.classList.remove('hidden')
            makeDefaultLanguageForm.querySelector('#default_language_name').value = localeData.name;
        } else {
            makeDefaultLanguageForm.querySelector('#default_language_name').value = '';
            modal.querySelector('[default_langage_content]').classList.remove('hidden')
            defaultLanguageElement.classList.add('hidden')
        }
    });
})


checkbox.addEventListener('change', () => {
    languageStatusForm.submit();
    checkbox.disabled = true;
    checkbox.classList.add('hidden')
    languageStatusForm.innerHTML = '';
    document.getElementById('change_default_language').classList.add('hidden')
    recreateNode(modal);

    languageStatusForm.insertAdjacentHTML('beforeend', `
<div class="flex flex-col items-center justify-center">
                        <div class="mt-3">
                            <p class="text-slate-800">
                                ${modal.dataset.progress}
                            </p>
                        </div>
                        <div role="status" class="mt-3">
                            <svg aria-hidden="true" class="mr-2 h-8 w-8 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                        </div>
                    </div>
    `)
})

function recreateNode(el, withChildren) {
    if (withChildren) {
        el.parentNode.replaceChild(el.cloneNode(true), el);
    } else {
        const newEl = el.cloneNode(false);
        while (el.hasChildNodes()) newEl.appendChild(el.firstChild);
        el.parentNode.replaceChild(newEl, el);
    }
}
