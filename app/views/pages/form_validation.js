//Using JustValidate to implement registration validation for the following fields
const validation = new JustValidate('#sign-up-form');

/* Adding validation for the first_name_sign_up and last_name_sign_up ids. Making it a required field, minimum length of 3, 
   maximum length of 30, and adding custom regex to eliminate special characters or numbers from being entered.
   Also, making the first letter must be capitalized.
*/

validation
    .addField('#first_name_sign_up', [
        { 
            rule: 'required',
        },
        {
            rule: 'minLength',
            value: 3,
        },
        {
            rule: 'maxLength',
            value: 30,
        },
        {
            rule: 'customRegexp',
            value: /^[A-Z][a-z]+(([',. -][a-z])?[a-z]*)*$/,
            errorMessage: 'First letter must be capitalized, no numbers, or special characters',
        },
    ])
    .addField('#last_name_sign_up', [
        {
            rule: 'required',
        },
        {
            rule: 'customRegexp',
            value: /^[A-Z][a-z]+(([',. -][a-z])?[a-z]*)*$/,
            errorMessage: 'First letter must be capitalized, no numbers, or special characters',
        },
    ])
    
    /* Validation for email. Grabbing the email_validator.php file and and determining if the email enterd is considered as a legitimate
    email or not. This also checks to see if the email is has already been used in a previous registration. */
    
    .addField('#email_sign_up', [
        {
            rule: 'required'
        },
        {
            validator: (value) => () => {
                return fetch("email_validator.php?email=" + encodeURIComponent(value))
                .then(function(response) {
                    return response.json();
                })
                .then(function(json) {
                    return json.available;
                });
            },
            errorMessage: 'Email is already taken',
        },
        {
            rule: 'email',
            errorMessage: 'Enter a valid email address!',
        },
    ])
    
    /* Validation for email. Making it required and both the password and the confirm password must be matching. */
    
    .addField('#password_sign_up', [
        {
            rule: 'required'
        },
        {
            rule: 'password'
        }
    ])
    .addField('#re-password_sign_up', [
        {
            validator: (value, fields) => {
                return value === fields['#password_sign_up'].elem.value;
            },
            errorMessage: 'Passwords must match!',
        },
    ])
    .onSuccess((event) => {
        document.getElementById("sign-up-form").submit();
    });
