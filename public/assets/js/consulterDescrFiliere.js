let textarea = document.querySelector("#update-descriptif");
let updateButton = document.querySelector("#update-button");


function updateTextArea() {
    textarea.classList.add('open-textarea');
    updateButton.hidden = true;
}

function cancelUpdate(event) {
    event.preventDefault();
    textarea.classList.remove('open-textarea');
    setTimeout(() => updateButton.hidden = false,750)      
}