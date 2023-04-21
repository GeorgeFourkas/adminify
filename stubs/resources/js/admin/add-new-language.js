const addNewLanguageButton = document.getElementById('add_lang');
const addNewLanguageContainer = document.getElementById('locale-form');
const newLanguageField = document.getElementById('select_language');

addNewLanguageButton.addEventListener('click', () => {
    addNewLanguageContainer.classList.toggle('hidden')
    newLanguageField.focus();
    addNewLanguageButton.classList.toggle('hidden')
});
newLanguageField.addEventListener('change', () => {
    document.getElementById('add_new_language_form').submit();
});


newLanguageField.addEventListener('focusout', () => {
    addNewLanguageContainer.classList.toggle('hidden')
    addNewLanguageButton.classList.toggle('hidden')
})
