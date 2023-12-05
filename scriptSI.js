
let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
let passwordRegex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

    
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

    alert('Forma është dorëzuar me sukses!');
  }
}


<<<<<<< HEAD
=======
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
>>>>>>> 06da2a29ec5ed53245f8c7f0c04ed3e89f707fa7
