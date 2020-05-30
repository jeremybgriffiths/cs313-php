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