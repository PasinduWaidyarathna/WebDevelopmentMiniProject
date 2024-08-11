function registerFormValidation(){

    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirm_password").value.trim();

    let usernamePattern = /^[A-Za-z]+$/;
    let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    if (username === "") {
        alert("Username must be filled out");
        return false;
    } else if (!username.match(usernamePattern)) {
        alert("Username can only contain letters");
        return false;
    }

    if (email === "") {
        alert("Email must be filled out");
        return false;
    } else if (!email.match(emailPattern)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (password === "") {
        alert("Password must be filled out");
        return false;
    } else if (!password.match(passwordPattern)) {
        alert("Password must be 8-15 characters long, include at least one lowercase letter, one uppercase letter, one numeric digit, and one special character.");
        return false;
    }

    if (confirmPassword === "") {
        alert("Please confirm your password");
        return false;
    } else if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    return true;
}
