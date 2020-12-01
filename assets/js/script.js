function submitlogin() {
    var form = document.login;
    if (form.emailusername.value == "") {
        alert("Veuillez saisir un pseudo ou une adresse mail");
        return false;
    } else if (form.password.value == "") {
        alert("Veuillez saisir votre mot de passe");
        return false;
    }
}

function submitreg() {
    var form = document.reg;
    if (form.name.value == "") {
        alert("Veuillez saisir votre nom prénom");
        return false;
    } else if (form.uname.value == "") {
        alert("Veuillez saisir votre pseudonyme");
        return false;
    } else if (form.upass.value == "") {
        alert("Veuillez saisir votre mot de passe");
        return false;
    } else if (form.uemail.value == "") {
        alert("Veuillez saisir votre mail");
        return false;
    }
}