/*
//Storing the #id values from html into const variables 
const first_name = document.querySelector('#first_name');
const last_name = document.querySelector('#last_name');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const confirm_pass = document.querySelector('#re-password');

const sign_up_form = document.querySelector('#form');

// Prevents the form page from submitting when clicked on 
form.addEventListener('submit', function (e) {

    e.preventDefault();
});

// If the input from the user is empty then this isRequired() will trigger.
const isRequired = value >= value === '' ? false : true;

const between = (length, min, max) => length < min || length > max ? false : true;

// Will use this regular expression to check if the email is valid.
const valid_email = (email) => {
    const regular_exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regular_exp.test(email);
};

// Regular expression to check if password is valid.
const valid_password = (password) => {
    const val_pass = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";
    return val_pass.test(password);
}

const form_error = (input, message) => {
    const form_field = input.parentElement;

    form_field.classList.remove('success');
    form_field.classList.remove('failure');

    const error = form_field.querySelector('small');
    error.textContent = message;
}

const form_success = (input) => {
    const form_field = input.parentElement;

    form_field.classList.remove('failure');
    form_field.classList.remove('success');
    const error = form_field.querySelector('small');
    
    error.textContent = '';
}

const validate_first_name = () => {
    let valid = false;
    const min = 3;
    max = 25;

    const firstname = first_name.value.trim();

    if (!isRequired(firstname)) {
        showError(first_name, 'Enter a valid first name');
    } else if (!between(firstname.length, min, max)) {
        showError(first_name, 'Must Enter a valid last name');
}
    else {
        showSuccess(first_name);
        valid = true;
    }
    return valid;
}

const validate_last_name = () => {
    let valid = false;
    const min = 3;
    max = 25;

    const lastname = last_name.value.trim();

    if (!isRequired(lastname)) {
        showError(last_name, 'Enter a valid first name');
    } else if (!between(lastname.length, min, max)) {
            showError(last_name, 'Must Enter a valid last name');
    }
    else {
        showSuccess(last_name);
        valid = true;
    }
    return valid;
}

const validate_email = () => {
    let valid = false;
    const my_email = email.value.trim();

    if (!isRequired(my_email)) {
        showError(email, 'Email is required');
    } else if (!valid_email(my_email)) {
        showError(email, 'Email needs to be valid');
    } else {
        showSuccess(email);
        valid = true;
    }
    return valid;
}

*/