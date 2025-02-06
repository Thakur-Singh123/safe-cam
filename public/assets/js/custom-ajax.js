//Contact us 
$(document).ready(function () { 
    //form validation
    $('#ContactUs').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            subject: {
                required: true,
            },
            message: {
                required: true,
            }
        },
        messages: { },
        submitHandler: function (form, e) {
            e.preventDefault();
            //Serialize form data
            var formData = $(form).serialize();      
            //Ajax submit form
            $.ajax({
                type: 'POST',
                url: base_url + '/submit-contact',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $(".com_ajax_loader").show();
                    $('.disable-submit').prop('disabled', true);
                },
                //Success response
                success: function (response) {
                    $('.contact_us_res').html(response);
                    $(".disable-submit").prop('disabled', false);
                    $(".com_ajax_loader").hide();
                    $('#ContactUs')[0].reset();
                }
            });
        }
    });
});