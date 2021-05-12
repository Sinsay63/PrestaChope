const eye = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

eye.addEventListener('click',() =>{
    
    if(password.getAttribute("type") === "text"){
        password.setAttribute("type","password");
    }
    else if(password.getAttribute("type") === "password"){
        password.setAttribute("type","text");
    }
});

