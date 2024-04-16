import Quill from 'quill/core';
import 'quill/dist/quill.snow.css';
import Toolbar from 'quill/modules/toolbar';
import Snow from 'quill/themes/snow';
import Bold from 'quill/formats/bold';
import Italic from 'quill/formats/italic';
import Header from 'quill/formats/header';
import Underline from 'quill/formats/underline';
import Video from 'quill/formats/video';
import Code from 'quill/formats/code';
import Link from 'quill/formats/link';
import Strike from 'quill/formats/strike'; // Adicionamos o formato de texto 'strike'
import Script from 'quill/formats/script';
import List from 'quill/formats/list';

// Registra os módulos e temas
Quill.register({
  'modules/toolbar': Toolbar,
  'themes/snow': Snow,
  'formats/bold': Bold,
  'formats/italic': Italic,
  'formats/header': Header,
  'formats/underline': Underline,
  'formats/video': Video,
  'formats/code': Code,
  'formats/link': Link,
  'formats/strike': Strike, // Registrando o formato de texto 'strike'
  'formats/script': Script,
  'formats/list': List,
});

// Inicializa o Quill editor
const initializeQuillEditor = () => {
    const editor = new Quill('#editor', {
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['video', 'code-block'],
                ['link'],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['clean']
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow' // or 'bubble'
    });

    const quillEditor = document.getElementById('editor-area');

    // Atualiza o valor do campo de texto quando o conteúdo do editor muda
    editor.on('text-change', (delta, oldDelta, source) => {
        if (source === 'user') {
            quillEditor.value = editor.root.innerHTML;
        }
    });

    // Atualiza o conteúdo do editor quando o campo de texto muda
    quillEditor.addEventListener('input', () => {
        editor.root.innerHTML = quillEditor.value;
    });
};

// Aguarda o DOM ser completamente carregado antes de inicializar o Quill
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('editor-area')) {
        initializeQuillEditor();
    }
});

export default Quill;
