import {Tabs} from "flowbite";


const s = new Tabs([
    {
        'id': 'website',
        triggerEl: document.querySelector('#web_text_toggler'),
        targetEl: document.querySelector('#website_texts')
    },
    {
        'id': 'admin',
        triggerEl: document.querySelector('#admin_text_toggler'),
        targetEl: document.querySelector('#admin_texts')
    },
    {
        'id': 'system',
        triggerEl: document.querySelector('#system_text_toggler'),
        targetEl: document.querySelector('#system_texts')
    }
], {
    defaultTabId: 'website',
    activeClasses: 'text-[#c6119f] hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {
        console.log('tab is shown');
    }
});
