$().ready(function() {
		// Override Defaults in jQuery plugin
	$.validator.setDefaults({
		highlight: function(element) {

			$(element).closest('.form-group').addClass('has-error');

		},
		unhighlight: function(element) {

			$(element).closest('.form-group').removeClass('has-error');

		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		}
	});
	//validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			first_name: "required",
			last_name: "required",

			email: {
				required: true,
				email: true
			},
			phone:{
				required:true,
				phoneUS: true
			},
			password:{
				required: true,
				minlength: 5
			},
			password_confirmation:{
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
		},
		messages: {
			first_name: "Please enter your firstname",
			last_name: "Please enter your last name",
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			password_confirmation:{
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			}

		}
	});
	
});

