$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		// process the form
		$('form').submit(function(event) {

			$('#message').text(""); // clear message text
			$('input').removeClass('has-error'); // clear error coloring on input
			$('.error').text(""); // clear error text

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
					if(data.errors){
						// handle errors for room
						if (data.errors.room) {
							// add the error class to show red input
							$('input[name=room]').addClass('has-error'); 
							// add the actual error message under our input
							$('#room-error').text(data.errors.room);
						}

						// handle errors for host
						if (data.errors.host) {
							// add the error class to show red input
							$('input[name=host]').addClass('has-error'); 
							// add the actual error message under our input
							$('#host-error').text(data.errors.host);
						}

						if (data.errors.database){
							console.log(data.errors.database);
							$("p.error").text("Database Error");
						}

					} else { // account created
						$('#message').html(data.message);
					}
				}).fail(function(error){console.log(error);});

			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();
		});

});
