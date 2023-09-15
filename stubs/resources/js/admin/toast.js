import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"

const element = document.querySelector('[toast]');
if (element) {
    const toast = JSON.parse(element.dataset.toasts ?? '{}');
    if (toast?.success) {
        initToat(toast?.success, "rgb(132 204 22)")
    }

    if (toast?.error) {
        initToat(toast?.error, "#dc2626")
    }
    if (toast?.bag) {
        toast.bag.forEach((error) => {
            initToat(error, "#dc2626")
        })
    }
}

function initToat(text, color) {
    Toastify({
        text: text,
        duration: 5000,
        gravity: "top",
        position: "center",
        stopOnFocus: true, // Prevents dismissing of toast on hover
        className: "capitalize rounded-xl",
        style: {
            background: color,
            padding: "10px 60px",
            borderRadius: "0.5rem"
        },
    }).showToast();
}
