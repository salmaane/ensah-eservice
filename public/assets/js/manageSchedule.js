
function dragStartHandler(event) {
    event.dataTransfer.setData("text/html",event.target.id);
    event.dataTransfer.dropEffect = "copy";
  }

const module_dropzones = document.querySelectorAll(".module-dropzone");

module_dropzones.forEach(element => {
    element.addEventListener("drop", e => {
        e.preventDefault();
        const data = e.dataTransfer.getData("text/html");
        const clonedElement = document.getElementById(data).cloneNode(true);
        e.target.appendChild(document.getElementById(data));
    });
    element.addEventListener("dragover",function(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = "move";
    });
});