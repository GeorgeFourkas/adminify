const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        'node_modules/flowbite/**/*.js'

    ],

    theme: {
        extend: {
            animation: {
                'spin-slow': 'spin 4s linear infinite',
                'bounce-slow': 'bounce 5s linear infinite'
            },
            backgroundImage: {
                'transform-business-bg': 'url(/resources/images/transform_bussiness_section_background.png)',
                'work-with-us-bg': 'url(/resources/images/work_with_us_section_bg.png)',
                'login': 'url(/resources/images/admin/curved-images/curved6.jpg)',
                'progress-bars': 'url(/resources/images/progress-bars-bg.png)',
                'blog-bottom': 'url(/resources/images/blog_bottom_wave.png)',
                'about-us-hero': 'url(/resources/images/pic_paralax_2.jpg)',
                'about-progress': 'url(/resources/images/PCC_bg_img.jpg)',
                'clouds': 'url(/resources/images/bg-clouds_bottom.png)',
                'hero-bg': 'url(/resources/images/home09_bg.jpg)',
                'laptop': 'url(/resources/images/admin/ivancik.jpg)'
            },
            colors: {
                'about-us-light-pink': '#776beb',
                'paragraphGray': '#696687',
                'footerPurple': '#0d183f',
                'about-box-2': '#fffcf6',
                'about-box-3': '#f0fffc',
                'about-box-1': '#f9f8ff',
                'lightPurple': '#6254e7',
                'darkPurple': '#3b3663',
                'heroBlue': '#181e47',
                'orangy': '#FA9D4D',
                'pinky': '#FF4C6C',
                'overlay-body': 'rgba(0, 0, 0, 0.5)',
                'slate-950': 'rgb(20,23,40)',
                'gray-950': 'rgb(17,19,34)',
                pink: {
                    500: "#ff0080",
                },
                purple: {
                    700: "#7928ca",
                }
            },
            fontSize: {
                '360': '360px',
                'xxs': '0.65rem',
                'xssm': '0.8rem',

            },
            fontFamily: {
                'admin-sans': ['Open Sans'],
                'nunito': ['Nunito'],
                'montserrat': ['Montserrat'],
                'rubik': ['Rubik'],
                'source': ['Source Serif Pro']
            },
            boxShadow: {
                'soft-xxs': '0 1px 5px 1px #ddd',
                'soft-xs': '0 3px 5px -1px rgba(0,0,0,.09),0 2px 3px -1px rgba(0,0,0,.07)',
                'soft-sm': '0 .25rem .375rem -.0625rem hsla(0,0%,8%,.12),0 .125rem .25rem -.0625rem hsla(0,0%,8%,.07)',
                'soft-md': '0 4px 7px -1px rgba(0,0,0,.11),0 2px 4px -1px rgba(0,0,0,.07)',
                'soft-lg': '0 2px 12px 0 rgba(0,0,0,.16)',
                'soft-xl': '0 20px 27px 0 rgba(0,0,0,0.05)',
                'soft-2xl': '0 .3125rem .625rem 0 rgba(0,0,0,.12)',
                'soft-3xl': '0 8px 26px -4px hsla(0,0%,8%,.15),0 8px 9px -5px hsla(0,0%,8%,.06)',
                'soft-primary-outline': '0 0 0 2px #e9aede',
                'blur': 'inset 0 0 1px 1px hsla(0,0%,100%,.9),0 20px 27px 0 rgba(0,0,0,.05)',
                'DEFAULT': '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
                'inner': 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)',
                'sm': '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                'md': '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
                'lg': '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)',
                'xl': '0 23px 45px -11px hsla(0,0%,8%,.25)',
                '2xl': '0 25px 50px -12px rgb(0 0 0 / 0.25)',
                'none': 'none',
            },
            width: {
                'percent-15': '15%',
            },
            zIndex: {
                '999': '999',
                '800': '800',
                '1000': '1000'
            },

        },
    },

    plugins:
        [
            require('@tailwindcss/forms'),
            require('flowbite/plugin')
        ],
};
