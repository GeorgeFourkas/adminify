const modalables = document.querySelectorAll('tr[modalable]')
const modal = document.getElementById('modal-overlay')
const form = document.getElementById('tag-form');
const availableLocales = JSON.parse(document.querySelector('body').dataset.availablelocales)
const modalTitle = document.getElementById('modal-title')
const createTagButton = document.getElementById('create-tag')
modalables.forEach((row) => {
    row.addEventListener('click', (e) => {
        if (row.querySelector("form[deletion-form]").contains(e.target)) {
            return;
        }
        modal.classList.toggle('hidden');
        form.action = row.dataset.route;
        modalTitle.textContent = modal.dataset.updatetitle
        availableLocales.forEach((availableLocale) => {
            const input = form.querySelector(`#tag_name_${availableLocale}`)
            const tagModel = JSON.parse(row.dataset.model);
            input.value = tagModel?.translations?.filter((translation) => {
                return translation.locale === availableLocale
            })[0]?.name ?? ''
        });
    });
});
modal.addEventListener('click', (e) => {
    if (e.target.id === 'modal-overlay') {
        modal.classList.add('hidden');
    }
});
createTagButton.addEventListener('click', () => {
    modal.classList.toggle('hidden');
    modalTitle.textContent = modal.dataset.createtitle;
    form.querySelectorAll('input[type="text"]').forEach((input) => {
        input.value = '';
    });
})
