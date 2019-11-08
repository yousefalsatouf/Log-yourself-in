console.log('This is a hello test from login ...');

//Login party ...
let logIn = document.querySelector('#go'),
    lgForm = document.querySelector(('#lg-form')),
    usrEmail = document.querySelector('#usr-email'),
    lgPass = document.querySelector('#lg-pass'),
    loginPage = "login.php",
    userPage = "user.php";

logIn.addEventListener("click", () => {
    if (usrEmail.value === "" || lgPass.value === "")
    {
        lgForm.action = loginPage;
    }
    else
    {
        lgForm.action = userPage;
    }

});
