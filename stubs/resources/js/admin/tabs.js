import 'flowbite';
import {Tabs} from 'flowbite';

const tabElements = [];
const locales = JSON.parse(document.querySelector('#tabExample')?.dataset.locales ?? null);

if (locales) {
    for (const locale in locales) {
        tabElements.push({
            id: locales[locale],
            triggerEl: document.querySelector('#profile-tab-example-' + locales[locale]),
            targetEl: document.querySelector('#profile-example-' + locales[locale])
        })
    }
}

const tabs = new Tabs(tabElements, {
    defaultTabId: tabElements[0]?.id,
    activeClasses: 'hover:text-blue-600 gradient-app-theme text-white shadow-soft-2xl z-30',
    inactiveClasses: 'bg-transparent text-gray-500',
});


export default tabs
