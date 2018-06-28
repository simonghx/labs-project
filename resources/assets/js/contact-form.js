let inputName = document.querySelector('#form-name');
let inputMail = document.querySelector('#form-email');
let inputSubject = document.querySelector('#form-subject');
let btnForm = document.querySelector('#btn-contact-submit');
let errorMessage = document.querySelector('.errorMessage');
let successMessage = document.querySelector('.successMessage');

let regexMail = /^[a-z0-9_\.\-]+@[a-z0-9]+\.[a-z]{2,10}(\.[a-z]{2,10})?/;
let regexName = /^(([A-ZÜ-ü]+[\-\']?)*([a-zA-ZÜ-ü]+)?\s)+([a-zA-ZÜ-ü]+[\-\']?)*([a-zA-ZÜ-ü]+)?$/;



function sendMail(event) {
    let count = 0;


    if (regexName.test(inputName.value)) {
        inputName.classList.remove('border-danger');
        count++;
    } else {
        inputName.classList.add('border-danger');
    }

    if (regexMail.test(inputMail.value)) {
        inputName.classList.remove('border-danger');
        count++;
    } else {
        inputMail.classList.add('border-danger');
    }

    if (inputSubject.value != "") {
        inputSubject.classList.remove('border-danger');
        count++;
    } else {
        inputSubject.classList.add('border-danger');
    }

    if (count != 3) {
        event.preventDefault();
        errorMessage.classList.remove('d-none');

    } else {
        successMessage.classList.remove('d-none');
        errorMessage.classList.add('d-none');
    }

}

btnForm.addEventListener('click', sendMail);