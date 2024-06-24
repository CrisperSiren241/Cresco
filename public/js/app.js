document.getElementById('username').addEventListener('blur', function() {
    validateField('username', this.value);
});

document.getElementById('email').addEventListener('blur', function() {
    validateField('email', this.value);
});

document.getElementById('password').addEventListener('blur', function() {
    validateField('password', this.value);
});

document.getElementById('password_confirmation').addEventListener('blur', function() {
    validateField('password', document.getElementById('password').value, 'password_confirmation', this.value);
});

function validateField(field, value, confirmField, confirmValue) {
    let data = {
        fieldToValidate: field,
        [field]: value,
        _token: $('meta[name="csrf-token"]').attr('content')
    };

    if (confirmField && confirmValue) {
        data[confirmField] = confirmValue;
    }

    $.ajax({
        url: registrationRoute,
        type: 'POST',
        data: data,
        success: function(response) {
            if (response.error) {
                document.getElementById(field + 'Error').innerText = response[field + 'Error'] || '';
                if (confirmField) {
                    document.getElementById(confirmField + 'Error').innerText = response[confirmField + 'Error'] || '';
                }
            } else {
                document.getElementById(field + 'Error').innerText = '';
                if (confirmField) {
                    document.getElementById(confirmField + 'Error').innerText = '';
                }
            }
        }
    });
}


