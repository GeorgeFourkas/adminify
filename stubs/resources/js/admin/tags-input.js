import axios from 'axios';

const activeLocale = document.querySelector('body').dataset.locale;
const suggestContainer = document.getElementById('tag-suggest');
const tagArea = document.getElementById('drawed-tags')
const form = document.getElementById('selected_tags')
const createPostForm = form.closest('form')
const input = document.getElementById('tag_input')
let pendingRequest = false;
let selectedTags = [];

window.addEventListener('keydown', (e) => {
    if (e.key === "Enter" && input === document.activeElement) {
        suggestContainer.classList.add('hidden')
        e.preventDefault()
        const url = '/tags/store'
        const tagName = input.value
        input.value = "";
        axios.post(url, {
            [activeLocale]: {
                name: tagName
            }
        }).then((response) => {
            setSelectedTag(response.data.name, response.data.id)
            drawTagPills();
        })
    }
})

if (JSON.parse(form.getAttribute('selected_tags'))) {
    const editingTags = JSON.parse(form.getAttribute('selected_tags'));
    editingTags.forEach((tag) => {
        setSelectedTag(tag.name, tag.id)
    })
    drawTagPills()
}


input.addEventListener('input', () => {
    suggestContainer.classList.remove('hidden')
    if (input.value === '') {
        suggestContainer.classList.add('hidden')
    }
    if (!pendingRequest) {
        pendingRequest = true;
        axios.get('/tags/search', {
            params: {
                search: input.value
            }
        })
            .then(response => {
                    pendingRequest = false;
                    suggestContainer.innerHTML = '';
                    response.data.tags.forEach((item) => {
                        suggestContainer.insertAdjacentHTML('beforeend', `
                                  <li class="relative cursor-pointer select-none py-2 pr-9 pl-3 text-gray-900 hover:bg-gradient-to-tl hover:from-purple-700 hover:to-pink-500 hover:text-white"
                                       selectable data-id="${item.id}" tabindex="-1"
                                        <span class="block truncate">
                                            <p>${item.name} </p>
                                        </span>
                                  </li
                    `)
                        suggestContainer.classList.remove('hidden')
                    });
                    document.querySelectorAll("li[selectable]").forEach((element) => {
                        element.addEventListener('click', () => {
                            setSelectedTag(element.querySelector('p').textContent, element.dataset.id)
                            drawTagPills();
                            suggestContainer.classList.add('hidden')
                            input.value = ''
                        })
                    })
                }
            )
    }
})
createPostForm.addEventListener('submit', (e) => {
    e.preventDefault();
    selectedTags.forEach((tag, key) => {
        createPostForm.insertAdjacentHTML('beforeend', `
           <input type="hidden" name="tags[${key}]" value="${tag.databaseId}">
       `)
    })
    createPostForm.submit();
})

function drawTagPills() {
    tagArea.innerHTML = ''
    selectedTags.forEach((selectedTag) => {
        tagArea.insertAdjacentHTML('beforeend', selectedTag.pill)
    })
    document.querySelectorAll('div[tag-pill]')
        .forEach((pill) => {
            pill.addEventListener('click', () => {
                selectedTags = selectedTags.filter((tag) => {
                    return tag.tagName.trim() !== pill.textContent.trim()
                })
                drawTagPills()
            })
        })
}


function setSelectedTag(databaseTagName, databaseId) {
    selectedTags.push({
        tagName: databaseTagName,
        databaseId: databaseId,
        get pill() {
            return `
              <div class="m-1 cursor-pointer rounded-md bg-green-100 p-1 text-center group hover:bg-gradient-to-tl hover:from-purple-700 hover:to-pink-500" tag-pill>
                <p class="break-words text-sm text-black group-hover:text-white">
                  ${this.tagName}
                </p>
              </div>`
        }
    })
}
