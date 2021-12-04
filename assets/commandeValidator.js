$(function() {
    $("form[name='orders']").validate({
        rules: {
            'orders[adress]': "required",
            'orders[postal_code]': {
            required: true,
            minlength : 5,
            maxlength : 5,
            number : true
             },
            'orders[city]': "required",
            'orders[card_number]': {
                required: true,
                minlength : 16,
                maxlength : 16,
                number : true
            },
            'orders[owner_name]': "required",
            'orders[crypto]': {
                required: true,
                minlength : 3,
                maxlength : 3,
                number : true
            },
        },
        messages: {
           'orders[postal_code]': "Le code postal est invalide",
            'orders[card_number]': "Le code est invalide",
            'orders[crypto]':"Le cryptogramme est invalide"
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.closest('div'));
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});