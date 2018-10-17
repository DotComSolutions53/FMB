var Register = function () {

	var handleRegister = function() {
	
		// ajax login function to be called right after the form validation success
        var ajaxLogin = function(form) {
            form = $(form);
            
            var data = JSON.stringify(form.serializeJSON());

            $.ajax({
                type: "POST",
                url: "http://www.app.faizkolkata.com/assets/php/register.php",
                data: data,
                dataType: "json",
                beforeSend:function(){
                    $('.alert-error,.alert-success').hide();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    document.getElementById('network_error_msg').click();
                },
                success: function(result){
                	// alert(result.message);
                    if(result.status == 200)
                    {
                    	document.getElementById('success').click();
                    	// window.location = "index.html";
                    }
                    else
                    {
                    	document.getElementById('error_msg').click();
                    }
                }
            });
        }
	
		$('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                hof_its: {
	                    required: true
	                }
	            },

	            messages: {
	                hof_its: {
	                    required: "Username is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                // $('.alert-danger', $('.login-form')).show();
	                document.getElementById('val_error_msg').click();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                ajaxLogin(form); // form validation success, call ajax form submit
	            }
	        });

        $('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    ajaxLogin($('.register-form')); //form validation success, call ajax form submit
                }
                return false;
            }
        });
	}

	return {
        //main function to initiate the module
        init: function () {        	
            handleRegister();
        }
    };

}();

jQuery(document).ready(function() {
	$.support.cors=true;
    Register.init();
	    
});
