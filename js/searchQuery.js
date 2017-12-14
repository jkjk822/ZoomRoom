$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		var selected = 'Event';
		$('#event-dropdown').show();
		$('#user-dropdown').hide();
		$('#room-dropdown').hide();

		// radio buttons clicked
		$('#event-radio').click(function(){
			selected = 'Event';
			$(this).attr('checked', true);
			$('#event-dropdown').show();
			$('#user-dropdown').hide();
			$('#room-dropdown').hide();
		});
		$('#user-radio').click(function(){
			selected = 'User';
			$(this).attr('checked', true);
			$('#user-dropdown').show();
			$('#event-dropdown').hide();
			$('#room-dropdown').hide();
		});
		$('#room-radio').click(function(){
			selected = 'Room';
			$(this).attr('checked', true);
			$('#room-dropdown').show();
			$('#event-dropdown').hide();
			$('#user-dropdown').hide();
		});


		// process the form
		$('form').submit(function(event) {
 
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();

			// get data from form
			var formData = $(this).serialize();
			formData += "&table="+selected; // add selected table
			formData += "&field="+$("#"+selected.toLowerCase()+"-dropdown"); // add selected field

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
					
				}).fail(function(error){console.log(error);});
		});

});
