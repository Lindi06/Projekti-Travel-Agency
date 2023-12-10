
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});





let emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
let nameRegex = /^[a-zA-Z]+$/;


 

function validateForm(){


    let email = document.getElementById('sign-in-email').value;
    let password = document.getElementById('sign-in-password').value;

        if (!emailRegex.test(email)) {
            alert('email invalid')
            return;
        }

        if (!passwordRegex.test(password)) {
            alert('password invalid')
            return;
        }

        else{

        alert('Login successful!');
      }
    }


    function validateSignUp(){
        let name=document.getElementById('sign-up-name').value;
        let email = document.getElementById('sign-up-email').value;
    let password = document.getElementById('sign-up-password').value;

    if(!nameRegex.test(name)){
        alert("name invalid")
        return;
    }

    if (!emailRegex.test(email)) {
        alert('email invalid')
        return;
    }

    if (!passwordRegex.test(password)) {
        alert('password invalid')
        return;
    }

    else{

    alert('Sign up successful! ');
  }

    }
