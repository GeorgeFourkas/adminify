import './bootstrap';

const scriptModules = import.meta.glob('./**/*.js');

for (const path in scriptModules) {
    scriptModules[path]().then((module) => {
        console.log(`Script Module from ${path} loaded`, module);
    });
}

import.meta.glob([
    '../images/**/*',
    '../images/admin/curved-images/**/*',
    '../images/admin/illustrations/**/*',
    '../images/admin/logos/**/*',
    '../images/admin/shapes/**/*',
    '../images/admin/small-logos/**/*',
], {eager: true});
