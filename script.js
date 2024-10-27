const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");
const inputPassword = document.getElementById("password")
const showPassword = document.getElementById("show_password")

registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});

showPassword.addEventListener("input", (e) => {
    if(e.target.checked) {
        inputPassword.setAttribute("type","text");
    }else{
        inputPassword.setAttribute("type","password");
    };

})