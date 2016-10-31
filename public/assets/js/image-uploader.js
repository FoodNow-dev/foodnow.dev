'use strict';

var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});

if(document.getElementById("file")){
	document.getElementById("file").onchange = function () {
	    var reader = new FileReader();
	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        document.getElementById("profile").src = e.target.result;
	    };


	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	};
};

