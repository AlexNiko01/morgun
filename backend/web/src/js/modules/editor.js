module.exports = (arr) => {

    const Quill = require('quill');
    const hljs = require('highlight.js');

    hljs.configure({
        languages: ['html', 'css', 'javascript']
    });


    let optionsText = {
        modules: {
            toolbar: [
                [{'header': [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'link'],
                [{'list': 'ordered'}, {'list': 'bullet'}],
                ['clean']
            ],
        },
        placeholder: 'Пишите текст...',
        syntax: true,
        theme: 'snow',

    };

    let optionCode = {
        modules: {
            syntax: {
                highlight: text => hljs.highlightAuto(text).value
            },
            formula: false,
            toolbar: [['code-block']]
        },
        placeholder: 'Пишите код...',
        useBR: false,
        theme: 'snow'
    };

    for (let i = 0; i < arr.length; i++) {
        let editorArea = arr[i].querySelector('.editor');
        let textArea = arr[i].querySelector('.editor_textarea');
        let editor = null;
        if (arr[i].classList.contains('editor_big')) {

            optionsText.modules.toolbar[3].push('image');
        }

        if (arr[i].classList.contains('html_editor')) {
            editor = new Quill(editorArea, optionCode);
            editor.format("code-block", true);
        } else {
            editor = new Quill(editorArea, optionsText);
        }

        let qlEditor = arr[i].querySelector('.ql-editor');
        textArea.value = qlEditor.innerHTML;

        editor.on('text-change', function () {
            textArea.value = qlEditor.innerHTML;
        });
    }


};