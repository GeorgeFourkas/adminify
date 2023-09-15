const fields = document.querySelectorAll('[contenteditable]');


fields.forEach((field) => {

    const hiddenInput = field.querySelector('input[type="hidden"]');

    field.addEventListener('input', function (){
        hiddenInput.value = field.textContent;
    })

    field.addEventListener('keydown', (e) => {
        if (e.keyCode === 46 || e.keyCode === 8) {
            if (isCursorInsideSpan(field)) {
                e.preventDefault()
            }
        }
    });
});

function isCursorInsideSpan(field) {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        return false;
    }

    const anchorNode = selection.anchorNode;

    let currentNode = anchorNode;
    while (currentNode && currentNode !== field) {
        if (currentNode.nodeName === 'SPAN') {
            return true;
        }
        currentNode = currentNode.parentNode;
    }

    return false;
}
