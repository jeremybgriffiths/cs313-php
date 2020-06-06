function validate() {
    var username = document.login.username.value;
    var password = document.login.password.value;

    if (username == null || username == "") {
        alert("Username can't be blank");
        return false;
    } else if (password == null || password == "") {
        alert("password can't be blank");
        return false;
    }
}

function checkPassword() {
    var userPassword = document.getElementById('passwordInput').value;
    var confirmPassword = document.getElementById('passwordConfirmationInput').value;

    if (userPassword != confirmPassword) {
        document.getElementById('error').innerHTML = 'Passwords do not match';
        document.getElementById('error').classList = 'display: inline';
        document.getElementById('error').classList = 'text-danger';
    } else {
        document.getElementById('error').classList = 'display: hidden';
    }
}