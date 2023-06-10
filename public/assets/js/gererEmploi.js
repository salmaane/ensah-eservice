function chooseClass(event) {
    // event.preventDefault();

    const formData = new FormData(document.getElementById("chooseClassFrom"));
    
    fetch("http://127.0.0.1/ensah-eservice/home/gererEmploi", {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.log(error);
    });

}