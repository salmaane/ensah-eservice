var exampleModal = document.getElementById('Modal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var inputName = exampleModal.querySelector('#module-name')
//   var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = recipient + ' Module';
  inputName.setAttribute('name','module-'+recipient);
//   modalBodyInput.value = recipient;
})