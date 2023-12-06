
let emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    let passwordRegex = /(?=^.{8,}$)((?=.\d)|(?=.\W+))(?![.\n])(?=.[A-Z])(?=.[a-z]).*$/;
 

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
