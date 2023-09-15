import axios from "axios";
import {appendLocale} from "@/admin/locale-prefix-parser";

const submitBtn = document.getElementById('submit_new_category');
const locale = document.querySelector('body').dataset.locale;
const container = document.getElementById('categories_container');

submitBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const input = document.getElementById('new_category_name');
    document.getElementById('create_new_category').classList.add('hidden');
    axios.post(appendLocale() + 'master/admin/categories/store', {
        [locale]: {
            name: input.value,
            parent_id: null
        }
    })
        .then((response) => {
            container.insertAdjacentHTML('beforeend', `
            <div class="flex w-full items-center" category-checkbox>
              <input type="checkbox" value="${response.data.id ?? ''}" name="categories[]" checked class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-pink-600 focus:ring-0 focus:ring-offset-0">
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

