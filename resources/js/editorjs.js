import EditorJS from '@editorjs/editorjs';
import Paragraph from "@editorjs/paragraph";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Link from "@editorjs/link";
import Delimiter from "@editorjs/delimiter";
import CheckList from "@editorjs/checklist";

const EDITOR_JS_TOOLS = {
  paragraph: {
    class: Paragraph,
    inlineToolbar: true,
  },
  checkList: CheckList,
  list: List,
  header: Header,
  delimiter: Delimiter,
  link: Link,
};

const editor = new EditorJS({
    holder: 'editorjs',
    tools: EDITOR_JS_TOOLS,
    onChange: async () => {
        // Atualize o valor do textarea 'content' com o conteúdo do EditorJS
        const savedData = await editor.save();
        document.getElementById('content').value = JSON.stringify(savedData);
    }
});
