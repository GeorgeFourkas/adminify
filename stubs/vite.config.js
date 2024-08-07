import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {createRequire} from 'node:module';
import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';

const require = createRequire(import.meta.url);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/admin/CKEditor/ckeditor.js',
                'resources/js/admin/add-new-language.js',
                'resources/js/admin/admin_language_picker.js',
                'resources/js/admin/already-uploaded-media-chooser.js',
                'resources/js/admin/approve-toggler.js',
                'resources/js/admin/category-checkbox-click.js',
                'resources/js/admin/category-crud.js',
                'resources/js/admin/charts/chart-colors.config.js',
                'resources/js/admin/charts/charts.js',
                'resources/js/admin/charts/modules/cards/average-session-time.js',
                'resources/js/admin/charts/modules/cards/users-today.js',
                'resources/js/admin/charts/modules/live-users.js',
                'resources/js/admin/charts/modules/map.js',
                'resources/js/admin/charts/modules/session-sources.js',
                'resources/js/admin/charts/modules/top-pages.js',
                'resources/js/admin/charts/modules/traffic.js',
                'resources/js/admin/child-toggle.js',
                'resources/js/admin/confirm-modal.js',
                'resources/js/admin/create-category-from-modal.js',
                'resources/js/admin/date-picker.js',
                'resources/js/admin/feature-settings-form.js',
                'resources/js/admin/filepond/filepond.js',
                'resources/js/admin/full-comment-body-togler.js',
                'resources/js/admin/media-details.js',
                'resources/js/admin/menu-toggler.js',
                'resources/js/admin/modal-overlay.js',
                'resources/js/admin/nested_category_select.js',
                'resources/js/admin/publish_language_modal.js',
                'resources/js/admin/reload_page_on_media_upload.js',
                'resources/js/admin/remove-media-on-click-multiple-dropzone.js',
                'resources/js/admin/rich-editor.js',
                'resources/js/admin/tabs.js',
                'resources/js/admin/tag-modal.js',
                'resources/js/admin/tags-input.js',
                'resources/js/admin/toast.js',
                'resources/js/admin/toggle-permission-submit.js',
                'resources/js/admin/upload-new-media-modal.js',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/collapse.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
        ckeditor5({theme: require.resolve('@ckeditor/ckeditor5-theme-lark')})
    ],
});
