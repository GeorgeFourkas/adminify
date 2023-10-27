export function drawMostViewedPages(pages) {
    document.getElementById('pages_placeholder').remove();
    const timelineContainer = document.getElementById('timeline-container');
    pages.forEach((page, index) => {
        if (page?.pageTitle === '(not set)') {
            return
        }
        timelineContainer.insertAdjacentHTML('beforeend', `
                <div class="relative mb-4 after:clear-both after:table after:content-['']" id="timeline-row">
                         <span class="absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center text-base font-semibold w-6.5 h-6.5">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 event-${index}">
                                <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 013.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0121 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 017.5 16.125V3.375z" />
                                <path d="M15 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0017.25 7.5h-1.875A.375.375 0 0115 7.125V5.25zM4.875 6H6v10.125A3.375 3.375 0 009.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V7.875C3 6.839 3.84 6 4.875 6z" />
                             </svg>
                        </span>
                        <div class="relative w-auto ml-[2.813rem] pt-1.5 -top-1.5 lg:max-w-120">
                            <a href=" https://${page.fullPageUrl}" target="_blank" class="mb-0 text-sm font-semibold leading-normal text-slate-700 hover:text-adminify-main-color">
                               ${page.pageTitle}
                            </a>
                            <p class="mt-1 mb-0 text-xs font-semibold capitalize leading-tight text-slate-400">
                                page views: ${page.totalUsers}
                            </p>
                    </div>
                </div>
        `)
    })
}
