import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {createRequire} from 'node:module';
import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';

const require = createRequire(import.meta.url);

export default defineConfig({
    optimizeDeps: {
        esbuildOptions: {
            legalComments: 'none'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/admin/create-category-from-modal.js',
                'resources/js/admin/modal-overlay.js',
                'resources/js/admin/add-new-language.js',
                'resources/js/admin/already-uploaded-media-chooser.js',
                'resources/js/admin/approve-toggler.js',
                'resources/js/admin/category-checkbox-click.js',
                'resources/js/admin/category-crud.js',
                'resources/js/admin/charts.js',
                'resources/js/admin/child-toggle.js',
                'resources/js/admin/confirm-modal.js',
                'resources/js/admin/date-picker.js',
                'resources/js/admin/drawCharts.js',
                'resources/js/admin/dropzone.js',
                'resources/js/admin/dynamic-meta-fields.js',
                'resources/js/admin/feature-settings-form.js',
                'resources/js/admin/full-comment-body-togler.js',
                'resources/js/admin/live-analytics.js',
                'resources/js/admin/locale-prefix-parser.js',
                'resources/js/admin/media-details.js',
                'resources/js/admin/menu-toggler.js',
                'resources/js/admin/publish_language_modal.js',
                'resources/js/admin/rich-editor.js',
                'resources/js/admin/slug.js',
                'resources/js/admin/tabs.js',
                'resources/js/admin/tag-modal.js',
                'resources/js/admin/tags-input.js',
                'resources/js/admin/toggle-permission-submit.js',
                'resources/js/admin/upload-new-media-modal.js',
                'resources/js/app.js',
                'resources/js/flash-timeout.js',
                'resources/css/app.css',
                'resources/css/custom.css',
                'resources/css/scrollbar.css',
                'resources/js/admin/CKEditor/ckeditor.js',
            ],
            refresh: true,
        }),
        ckeditor5({theme: require.resolve('@ckeditor/ckeditor5-theme-lark')})

    ],
});
