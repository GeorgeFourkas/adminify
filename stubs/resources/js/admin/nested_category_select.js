const button = document.querySelector('button[data-role="category_parent_toggler"]')
const selectedCategoryName = document.getElementById('chosen_text');
const container = document.getElementById('container');
button.addEventListener('click', () => {
    container.classList.remove('hidden');
    container.focus();
})
container.addEventListener('focusout', () => {
    container.classList.add('hidden')
})
container.querySelectorAll('p[data-category-id]').forEach((listItem) => {
    listItem.addEventListener('click', () => {
        const text = listItem.textContent;
        document.getElementById('parent_id').value = listItem.dataset.categoryId;
        document.getElementById('chosen_text').textContent = text
        document.activeElement.blur();
    });
});
