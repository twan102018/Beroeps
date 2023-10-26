function toggleForm() {
    var registerForm = document.getElementById("registerForm");
    var loginForm = document.getElementById("loginForm");
    var button = document.getElementById("button");

    if (registerForm.style.display === "block") {
        registerForm.style.display = "none";
        loginForm.style.display = "block";
        button.innerHTML = "go to register";
    } else {
        registerForm.style.display = "block";
        loginForm.style.display = "none";
        button.innerHTML = "go to login";

    }
}