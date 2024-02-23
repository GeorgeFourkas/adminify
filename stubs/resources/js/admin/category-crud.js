const buttons = document.querySelectorAll("[edit-category-button]");
const crudPanel = document.getElementById('crud-panel')
const availableLocales = JSON.parse(document.querySelector('body').dataset.availablelocales);
const parentIdSelect = document.getElementById('parent_id');
const options = document.querySelectorAll('p[data-category-id]')
const createCategoryBtn = document.getElementById('create_category');
const form = document.getElementById('categories_crud_form');
const chosenCategoryTextField = document.getElementById('chosen_text');
const chosenCategoryIdInput = document.getElementById('parent_id')

buttons.forEach((btn) => {
    const category = JSON.parse(btn.dataset.category ?? '{}');

    btn.addEventListener('click', () => {
        console.log(category);
        form.action = form.dataset.update + '/update/' + category.id
        if (crudPanel.classList.contains('hidden')) {
            crudPanel.classList.remove('hidden')
        }
        const option = Array.from(options).find((opt) => {
            return opt.dataset.categoryId === btn.dataset.parentid
        })
        if (option) {
            chosenCategoryTextField.textContent = option.textContent;
            chosenCategoryIdInput.value = option.dataset.categoryId
        }else{
            chosenCategoryIdInput.value = null;
            chosenCategoryTextField.textContent = '-';
        }

        window.scrollTo(0, 0)
        availableLocales.forEach((locale) => {
            const inputValue = document.getElementById('category-' + locale)
            inputValue.value = category?.translations.filter((obj) => {
                return obj.locale === locale;
            })[0]?.name ?? '';
        })
    })
    btn.dataset.category = "";
    btn.dataset.parentId = "";
    btn.dataset.parentName = "";
})

createCategoryBtn.addEventListener('click', () => {
    form.action = form.dataset.save
    if (crudPanel.classList.contains('hidden')) {
        crudPanel.classList.remove('hidden')
    }
    availableLocales.forEach((locale) => {
        document.getElementById('category-' + locale).value = ""
    })
    chosenCategoryTextField.textContent = '-';
    chosenCategoryIdInput.value = null
})




