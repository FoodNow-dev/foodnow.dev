$().ready(function() {
	//validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			first_name: "required",
			last_name: "required",

			email: {
				required: true,
				email: true
			},
			// phone:{
			// 	required:true,
			// 	phone: true
			// },
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

