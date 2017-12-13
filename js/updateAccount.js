$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		// process the form
		$('form').submit(function(event) {

			$('#message').text(""); // clear message text
			$('input').removeClass('has-error'); // clear error coloring on input
			$('.error').text(""); // clear error text
 
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();

			//client side validation
			if(!validate()) return;

			// get data from form
			var formData = $(this).serialize();
			// post to location designated in form
			var postURL = $(this).attr('action');

			// process the form
			$.ajax({
				type 		: 'POST', // post request
				url 		: postURL, // php file to handle the post
				data 		: formData, // data to be sent
				dataType 	: 'json', // data type expected back
				encode		: true
			})
				.done(function(data) { //on ajax success

					console.log(data);
					// if database error
					if (data.errors && data.errors.database){
						console.log(data.errors.database);
						$("p.error").text("Database Error");
					} else {
						var successful = [];
						if(data.password){
							successful.push("password");
							$("#current-pass").val("");
							$("#new-pass").val("");
							$("#confirm-pass").val("");
						}
						if(data.password === false){
							// add the error class to show red input
							$('input[name=current-pass]').addClass('has-error'); 
							// add the actual error message under our input
							$('#password-error').text("incorrect password");
						}
						if(data.email){
							successful.push("email");
							$("#new-email").val("");
						}
						if(data.phone){
							successful.push("phone");
							$("#new-phone").val("");
						}
						if(data.office){
							successful.push("office");
							$("#office").val("");
						}
						if(data.office === false){
							// add the error class to show red input
							$('input[name=office]').addClass('has-error'); 
							// add the actual error message under our input
							$('#office-error').text("invalid room (use cdcs format)");
						}

						if(successful.length == 1) $('#message').html("Updated " + successful[0] + " successfully!");
						else if (successful.length == 2) $('#message').html("Updated " + successful[0] + " and " + successful[1] + " successfully!");
						else if (successful.length >= 3){
							var msg = "Updated ";
							for(int i = 0; i < successful.length-1; i++)
								msg += successful[i] + ", ";
							msg += "and " + successful[successful.length-1] + " successfully!";
							$('#message').html(msg);
						}
					}					
					
				}).fail(function(error){console.log(error);});
		});

});

function validate() {
	var current = $("#current-pass").val();
	var newPass = $("#new-pass").val();
	var confirm = $("#confirm-pass").val();
	var email = $("#new-email").val();
	var phone = $("#new-phone").val();

	if (newPass !== confirm) {
		$("#match-error").text("passwords do not match");
		return false;
	}
	return true;
}
