
function dragStartHandler(event) {
    event.dataTransfer.setData("text/html",event.target.id);
    event.dataTransfer.dropEffect = "copy";
  }

const module_dropzones = document.querySelectorAll(".module-dropzone");

module_dropzones.forEach(element => {
    element.addEventListener("drop", e => {
        e.preventDefault();
        if(!e.target.classList.contains('module-dropzone')) return;
        const data = e.dataTransfer.getData("text/html");
        const module = document.getElementById(data);
        
        if(e.target.childNodes.length > 0) {
          e.target.childNodes[0].remove();
        };
        
        const clonedElement = module.cloneNode(true);
        clonedElement.id += '-cloned';
        e.target.appendChild(clonedElement);
    });

    element.addEventListener("dragover",e => {
        e.preventDefault();

        e.dataTransfer.dropEffect = "move";
    });
});

function deleteModule(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData("text/html");
    const module = document.getElementById(data);
    
    if(module.parentElement.tagName == 'TD') {
      module.remove();
    }

  }

function deleteDragOver(event) {
    event.preventDefault();

    event.dataTransfer.dropEffect = "move";
}