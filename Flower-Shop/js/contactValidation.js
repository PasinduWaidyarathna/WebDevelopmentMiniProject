function contactFormValidation(){

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();

    let namePattern = /^[A-Za-z]+$/;
    let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name === "") {
        alert("Name must be filled out");
        return false;
    } else if (!name.match(namePattern)) {
        alert("Name can only contain letters");
        return false;
    }

    if (email === "") {
        alert("Email must be filled out");
        return false;
    } else if (!email.match(emailPattern)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (message === "") {
        alert("Message cannot be empty");
        return false;
    } else if (message.length < 10) {
        alert("Message must be at least 10 characters long");
        return false;
    }

    return true;
}
