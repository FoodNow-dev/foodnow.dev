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
	//validate text messaging form on keyup and submit
	 $( "#info" ).validate({
                  rules: {
                    email_body: {
                      required: true,
                      minlength: 2
                    }
                   }
     });
});