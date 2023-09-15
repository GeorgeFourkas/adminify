const btns = document.querySelectorAll('[append_meta_field_btn]')
const containers = document.querySelectorAll('[meta_fields_container]')

attachEventListeners();
btns.forEach((btn, key) => {
    console.log(btn)
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        drawNewMetaField(containers[key]);
        attachEventListeners()
    })
})


function drawNewMetaField(element, nameMetaValue = '', valueMetaValue = '') {
    element.insertAdjacentHTML('beforeend', `
            <div class="mt-3 flex flex-col-reverse items-end justify-center lg:space-x-4 lg:flex-row lg:items-start" meta_fields_row>
                <div class="w-full lg:w-5/12">
                    <label class = 'block text-sm font-medium text-gray-700'>${element.dataset.meta_name_label}</label>
                    <input type="text" value="${nameMetaValue}" name="${element.dataset.tab}[meta][name][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                            border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                            transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
                  <div class="w-full lg:w-5/12">
                    <label class = 'block text-sm font-medium text-gray-700'>${element.dataset.meta_value_label}</label>
                    <input type="text" value="${valueMetaValue}" name="${element.dataset.tab}[meta][value][]" id="" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg
                            border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none
                            transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
                <div class="flex h-full cursor-pointer flex-col items-center justify-center p-0.5 group hover:bg-red-300" delete-meta>
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class ='h-6 w-6 text-red-700'>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        `)

}


function attachEventListeners() {
    const rows = document.querySelectorAll('[meta_fields_row]');
    rows.forEach((row) => {
        row.querySelectorAll('[delete-meta]').forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', () => {
                row.remove();
            })
        })
    })
}




