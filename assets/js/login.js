// altera 
const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#senha');
        togglePassword.addEventListener('click', () => {
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // altera o icone do olho
            if (togglePassword.classList.contains("bi-eye-slash")) {
                togglePassword.classList.remove("bi-eye-slash");
                togglePassword.classList.add('bi-eye');
            }else{
                togglePassword.classList.remove("bi-eye");
                togglePassword.classList.add('bi-eye-slash');
            }
           
            
        });