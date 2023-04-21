const parents = document.getElementsByClassName("caret");

Array.from(parents).forEach((parent) => {
    parent.addEventListener('click', (e) => {
        const editBtn = parent.querySelector('[edit-category-button]')
        if (editBtn.contains(e.target)) {
            return;
        }

        parent.parentElement.querySelector("[child-container]")?.classList.toggle("hidden");
        parent.parentElement.querySelector("span")
            .classList.toggle('rotate-90')
    })
})
