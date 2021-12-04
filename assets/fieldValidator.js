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
            'registration_form[plainPassword]' : "Mot de passe trop court, 5 charactères minimum",
            'registration_form[email]': "Email non valide."

        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.closest('div'));
            $('label.error').attr('class', 'small error');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});