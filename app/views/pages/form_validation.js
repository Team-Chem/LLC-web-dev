const validation = new JustValidate('#sign-up-form');

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