console.log('this is a hello from register ');
//Registration party ...

let register = document.querySelector('#register'),
    rgForm = document.querySelector(('#rg-form')),
    username = document.querySelector('#username'),
    rgEmail = document.querySelector('#rg-email'),
    rgPass = document.querySelector('#rg-password'),
    verify = document.querySelector('#verify'),
    registerPage = "register.php",
    logPage = "login.php",
    notMatchContainer = document.querySelector('.not-match'),
    notMatchErrorMsg = "Error Password doesn't match !";


register.addEventListener("click", () => {
    if (verify.value === "" || rgPass.value === "" || username.value === "" || rgEmail.value === "")
    {
        rgForm.action = registerPage;
    }
    if (rgPass.value !== verify.value)
    {
        rgForm.action = registerPage;
        verify.style.backgroundColor = "red";
        notMatchContainer.textContent = notMatchErrorMsg;
    }
    else
    {
        rgForm.action = logPage;
    }
});