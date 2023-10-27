import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor.js';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment.js';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote.js';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold.js';
import Code from '@ckeditor/ckeditor5-basic-styles/src/code.js';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials.js';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor.js';
import FontFamily from '@ckeditor/ckeditor5-font/src/fontfamily.js';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize.js';
import Heading from '@ckeditor/ckeditor5-heading/src/heading.js';
import Image from '@ckeditor/ckeditor5-image/src/image.js';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize.js';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload.js';
import Indent from '@ckeditor/ckeditor5-indent/src/indent.js';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic.js';
import Link from '@ckeditor/ckeditor5-link/src/link.js';
import List from '@ckeditor/ckeditor5-list/src/list.js';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed.js';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph.js';
import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';

class Editor extends ClassicEditor {
}

// Plugins to include in the build.
Editor.builtinPlugins = [
    SimpleUploadAdapter,
    Alignment,
    BlockQuote,
    Bold,
    Code,
    Essentials,
    FontColor,
    FontFamily,
    FontSize,
    Heading,
    Image,
    ImageResize,
    ImageUpload,
    Indent,
    Italic,
    Link,
    List,
    MediaEmbed,
    Paragraph,
];

// Editor configuration.
Editor.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'alignment',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'imageUpload',
            'blockQuote',
            'mediaEmbed',
            'undo',
            'redo',
            'fontFamily',
            'code',
            'alignment',
            'fontColor',
            'fontSize',
        ]
    },
    language: 'en',
    simpleUpload: {
        uploadUrl: '/master/admin/media/upload',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name=_token]').content
        }
    }
};

export default Editor;
