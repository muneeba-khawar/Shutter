function showSignUpForm() {
    let elm2 = document.getElementById("overlay");
    elm2.setAttribute("style", "opacity: 1; z-index: 1;");
    let elm = document.getElementById("signupForm");
    elm.setAttribute("style", "top: 50%; z-index: 2;");
}
function showLogInForm() {
    let elm2 = document.getElementById("overlay");
    elm2.setAttribute("style", "opacity: 1; z-index: 1;");
    let elm = document.getElementById("loginForm");
    elm.setAttribute("style", "top: 50%; z-index: 2;");
}

function removeSignUpForm() {
    let elm = document.getElementById("signupForm");
    elm.removeAttribute("style");
    let elm2 = document.getElementById("overlay");
    elm2.removeAttribute("style");
}
function removeLogInForm() {
    let elm = document.getElementById("loginForm");
    elm.removeAttribute("style");
    let elm2 = document.getElementById("overlay");
    elm2.removeAttribute("style");
}
function newUser(){
    let elm = document.getElementById("signupForm");
    elm.setAttribute("style", "top: 50%; z-index: 2;");
    let elm1 = document.getElementById("loginForm");
    elm1.removeAttribute("style");
}