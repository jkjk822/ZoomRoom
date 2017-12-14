$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		var selected = 'Event';

		// radio button clicked
		$('.search-bar-radio').click(function(){
			if($('#event-radio').is(':checked')){
				selected = 'Event';
				$('#event-dropdown').show();
				$('#user-dropdown').hide();
				$('#room-dropdown').hide();
			} else if($('#user-radio').is(':checked')){
				selected = 'User';
				$('#event-dropdown').hide();
				$('#user-dropdown').show();
				$('#room-dropdown').hide();
			} else if($('#room-radio').is(':checked')){
				selected = 'Room';
				$('#event-dropdown').hide();
				$('#user-dropdown').hide();
				$('#room-dropdown').show();
			}
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
