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
    var passwordElement = 'passwordInput';
    var confirmationpasswordElement = 'passwordConfirmationInput';

    var userPassword = document.getElementById(passwordElement).value;
    var secondPassword = document.getElementById(confirmationpasswordElement).value;

    if (userPassword != secondPassword) {
        document.getElementById('error').innerHTML = '******** Passwords do not match';
        document.getElementById('error').classList = 'display: inline';
        document.getElementById('error').classList = 'text-danger';
    } else {
        document.getElementById('error').classList = 'display: hidden';
    }
}