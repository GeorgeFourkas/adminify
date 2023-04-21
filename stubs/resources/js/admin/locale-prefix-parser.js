export function appendLocale() {
    const body = document.querySelector('body')
    const isMultilingual = JSON.parse(body.dataset.publishedlocales).length > 1;
    return isMultilingual ? `/${body.dataset.locale}/` : '/'
}
