$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		var selected = 'Event';
		$('#event-dropdown').show();
		$('#user-dropdown').hide();
		$('#room-dropdown').hide();

		// radio buttons clicked
		$('label[for=event]').click(function(){
			selected = 'Event';
			$('#event-radio').prop('checked', true);
			$('#event-dropdown').show();
			$('#user-radio').prop('checked', false);
			$('#user-dropdown').hide();
			$('#room-radio').prop('checked', false);
			$('#room-dropdown').hide();
		});
		$('label[for=user]').click(function(){
			selected = 'User';
			$('#user-radio').prop('checked', true);
			$('#user-dropdown').show();
			$('#event-radio').prop('checked', false);
			$('#event-dropdown').hide();
			$('#room-radio').prop('checked', false);
			$('#room-dropdown').hide();
		});
		$('label[for=room]').click(function(){
			selected = 'Room';
			$('#room-radio').prop('checked', true);
			$('#room-dropdown').show();
			$('#event-radio').prop('checked', false);
			$('#event-dropdown').hide();
			$('#user-radio').prop('checked', false);
			$('#user-dropdown').hide();
		});


		// process the form
		$('form').submit(function(event) {
 
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();

			// get data from form
			var formData = $(this).serialize();
			formData += "&table="+selected; // add selected table
			formData += "&field="+$("#"+selected.toLowerCase()+"-dropdown :selected").val(); // add selected field

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

					if(data.errors){}

					if(data.results){
						for(var i = 0; i < data.results.length; i++){
							$("#"+selected.toLowerCase()+"-table").append([
							"<tr>",
								"<td>"+results[i].eventName+"</td>",
								"<td>"+results[i].startTime+"</td>",
								"<td>"+results[i].endTime+"</td>",
								"<td>"+results[i].location+"</td>",
								"<td>"+results[i].host+"</td>",
								"<td>"+results[i].type+"</td>",
							"</tr>",
							].join("\n")
							);
						}
					}
					
				}).fail(function(error){console.log(error);});
		});

});
