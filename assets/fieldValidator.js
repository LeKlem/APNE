$(function() {
    $("form[name='registration_form']").validate({
        rules: {
            'registration_form[firstName]': "required",
            'registration_form[name]': "required",
            'registration_form[email]': {
                required: true,
                email: true
            },
            registration_form_plainPassword: {
                required: true,
                minlength: 5
            },
        'registration_form[phoneNumber]' : {
            required : true,
            number : true
        },
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Email non valide."

        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.closest('div'));
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});