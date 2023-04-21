const buttons = document.querySelectorAll("[edit-category-button]");
const crudPanel = document.getElementById('crud-panel')
const availableLocales = JSON.parse(document.querySelector('body').dataset.availablelocales);
const parentIdSelect = document.getElementById('input_parent_id');
const createCategoryBtn = document.getElementById('create_category');
const form = document.getElementById('categories_crud_form');
buttons.forEach((btn) => {
    const category = JSON.parse(btn.dataset.category ?? '{}');
    btn.addEventListener('click', () => {
        form.action = form.dataset.update + '/update/' + category.id
        if (crudPanel.classList.contains('hidden')) {
            crudPanel.classList.remove('hidden')
        }
        const option = Array.from(parentIdSelect.options).find((opt) => {
            return (parseInt(opt.value) === parseInt(btn.dataset.parentid.replace('"', '')))
        })
        if (option) {
            option.selected = true;
        } else {
            Array.from(parentIdSelect.options).find((opt) => {
                return opt.value === ""
            }).selected = true;
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
        Array.from(parentIdSelect.options).find((opt) => {
            return opt.value === ""
        }).selected = true;
    })
})




