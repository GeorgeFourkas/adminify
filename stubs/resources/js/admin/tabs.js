import 'flowbite';
import {Tabs} from 'flowbite';

const tabElements = [];

const tabHeaders = document.querySelectorAll('[tab_header]');
tabHeaders.forEach((header) => {
    tabElements.push({
        id: header.id,
        triggerEl: header,
        targetEl: document.querySelector(header.getAttribute('tab'))
    })
})


const tabs = new Tabs(tabElements, {
    defaultTabId: tabElements[0]?.id,
    activeClasses: 'hover:text-blue-600 gradient-app-theme text-white shadow-soft-2xl z-30',
    inactiveClasses: 'bg-transparent text-gray-500',
});
export default tabs
