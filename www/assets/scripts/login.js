var Login = function () {

	var handleLogin = function() {
	
		// ajax login function to be called right after the form validation success
        var ajaxLogin = function(form) {
            form = $(form);
            
            var data = JSON.stringify(form.serializeJSON());

            $.ajax({
                type: "POST",
                url: "http://www.app.faizkolkata.com/assets/php/login.php",
                data: data,
                dataType: "json",
                beforeSend:function(){
                    $('.alert-error,.alert-success').hide();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    document.getElementById('network_error_msg').click();
                },
                success: function(result){
                    if(result.status == 200)
                    {
                    	document.getElementById('success').click();
                    	window.location = "user/index.html";
                    }
                    else
                    {
                    	document.getElementById('error_msg').click();
                    }
                }
            });
        }
	
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                user_name: {
	                    required: true
	                },
	                user_password: {
	                    required: true
	                }
	            },

	            messages: {
	                user_name: {
	                    required: "Username is required."
	                },
	                user_password: {
	                    required: "Password is required."
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

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    ajaxLogin($('.login-form')); //form validation success, call ajax form submit
	                }
	                return false;
	            }
	        });
	}

	// var handleForgetPassword = function () {

	// 	var ajaxForgetPassword = function(form) {
 //            form = $(form);
            
 //            var data = JSON.stringify(form.serializeJSON());
            
 //            $.ajax({
 //                type: "POST",
 //                url: "assets/global/php/forget_password.php",
 //                data: data,
 //                dataType: "json",
 //                beforeSend:function(){
 //                    $('.alert-error,.alert-success').hide();
 //                },
 //                error: function(jqXHR, textStatus, errorThrown){
 //                    //alert(errorThrown);
 //                    $('.alert-error').show();
 //                    $('.alert-error span').html(errorThrown);
 //                },
 //                success: function(result){
 //                	if(result.status == 200)
 //                	{
 //                		displayToastForgetPassword();
 //                	}
 //                	else if(result.status == 400)
 //                	{
 //                		displayToastForgetPasswordError();
 //                	}
 //                }
 //            });
 //        }

	// 	$('.forget-form').validate({
	//             errorElement: 'span', //default input error message container
	//             errorClass: 'help-block', // default input error message class
	//             focusInvalid: false, // do not focus the last invalid input
	//             ignore: "",
	//             rules: {
	//                 email: {
	//                     required: true,
	//                     email: true
	//                 }
	//             },

	//             messages: {
	//                 email: {
	//                     required: "Email is required."
	//                 }
	//             },

	//             invalidHandler: function (event, validator) { //display error alert on form submit   

	//             },

	//             highlight: function (element) { // hightlight error inputs
	//                 $(element)
	//                     .closest('.form-group').addClass('has-error'); // set error class to the control group
	//             },

	//             success: function (label) {
	//                 label.closest('.form-group').removeClass('has-error');
	//                 label.remove();
	//             },

	//             errorPlacement: function (error, element) {
	//                 error.insertAfter(element.closest('.input-icon'));
	//             },

	//             submitHandler: function (form) {
	//                 ajaxForgetPassword(form);
	//             }
	//         });

	//         $('.forget-form input').keypress(function (e) {
	//             if (e.which == 13) {
	//                 if ($('.forget-form').validate().form()) {
	//                     $('.forget-form').submit();
	//                 }
	//                 return false;
	//             }
	//         });

	//         jQuery('#forget-password').click(function () {
	//             jQuery('.login-form').hide();
	//             jQuery('.forget-form').show();
	//         });

	//         jQuery('#back-btn').click(function () {
	//             jQuery('.login-form').show();
	//             jQuery('.forget-form').hide();
	//         });

	// }

    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            // handleForgetPassword();   

        }
    };

}();

jQuery(document).ready(function() {
	$.support.cors=true;
	$( document ).bind( "mobileinit", function() {
	    // Make your jQuery Mobile framework configuration changes here!

	    $.mobile.allowCrossDomainPages = true;
	});
    Login.init();
    // alert("Here");
	    
});
