import React from 'react'
import "trix/dist/trix";
import "trix/dist/trix.css";
import { TrixEditor } from "react-trix";
const TextareaTrix = ({ value = "", handleChange, className, ...props }) => {

    const handleEditorReady = (editor) => {
        // this is a reference back to the editor if you want to
        // do editing programatically
        editor.insertString(value);
    }
    return (
        <TrixEditor {...props} className={'input-form '} onChange={handleChange} onEditorReady={handleEditorReady} />
    );
}

export default TextareaTrix
