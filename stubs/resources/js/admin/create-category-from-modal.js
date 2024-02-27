import axios from "axios";

const submitBtn = document.getElementById('submit_new_category');
const locale = document.querySelector('body').dataset.locale;
const container = document.getElementById('categories_container');

submitBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const input = document.getElementById('new_category_name');
    if (input.value === '') {
        input.classList.add('border-red-500')
        document.querySelector('label[for="new_category_name"]').classList.add('text-red-500')
        return;
    }
    document.getElementById('create_new_category').classList.add('hidden');
    axios.post('/master/admin/categories/store', {
        [locale]: {
            name: input.value,
            parent_id: null
        }
    })
        .then((response) => {
            input.classList.remove('border-red-500')
            document.querySelector('label[for="new_category_name"]').classList.remove('text-red-500')
            container.insertAdjacentHTML('beforeend', `
            <div class="mt-4 flex w-full items-center" category-checkbox>
              <input type="checkbox" value="${response.data.id ?? ''}" name="categories[]" checked class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-adminify-main-color focus:ring-0 focus:ring-offset-0">
              <label for="" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                ${response.data.name}
              </label>
            </div>
        `)
        });
    input.value = '';
    if (container.classList.contains('hidden')) {
        container.classList.remove('hidden');
    }
})

