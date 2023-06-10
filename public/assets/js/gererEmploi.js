
// let chooseForm = document.getElementById("chooseClassFrom");

// chooseForm.addEventListener("submit",function (event) {
//     event.preventDefault();

//     const formData = new FormData(this);
    
//     fetch("http://127.0.0.1/ensah-eservice/home/gererEmploi", {
//         method: 'post',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);
//     })
//     .catch(error => {
//         console.log(error);
//     });

// });

function deleteSchedule(event) {
    event.preventDefault();

    fetch("http://127.0.0.1/ensah-eservice/home/deleteSchedule",{
        method:'post'
    })
    .then(response => response.text())
    .then(data => {
        // console.log(data);
    })
    .catch(error => {
        console.log(error);
    })

    const closeModal = document.getElementById("modalCloseButton");
    const scheduleTable = document.getElementById("schedule");
    const deleteMessage = document.getElementById("deleteMessage");

    console.log(deleteMessage);

    closeModal.click();
    scheduleTable.remove();
    deleteMessage.style.display = 'block';

    setTimeout(()=>{
        deleteMessage.style.display = 'none';
    },2000)
}