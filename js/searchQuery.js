$(document).ready(function() { // ideas from https://scotch.io/tutorials/submitting-ajax-forms-with-jquery

		var selected = 'Event';
		$('#event-dropdown').show();
		$('#event-table').show();
		$('#user-dropdown').hide();
		$('#user-table').hide();
		$('#room-dropdown').hide();
		$('#room-table').hide();

		// radio buttons clicked
		$('label[for=event]').click(function(){
			selected = 'Event';
			$('#event-radio').prop('checked', true);
			$('#event-dropdown').show();
			$('#event-table').show();
			$('#user-radio').prop('checked', false);
			$('#user-dropdown').hide();
			$('#user-table').hide();
			$('#room-radio').prop('checked', false);
			$('#room-dropdown').hide();
			$('#room-table').hide();
		});
		$('label[for=user]').click(function(){
			selected = 'User';
			$('#user-radio').prop('checked', true);
			$('#user-dropdown').show();
			$('#user-table').show();
			$('#event-radio').prop('checked', false);
			$('#event-dropdown').hide();
			$('#event-table').hide();
			$('#room-radio').prop('checked', false);
			$('#room-dropdown').hide();
			$('#room-table').hide();
		});
		$('label[for=room]').click(function(){
			selected = 'Room';
			$('#room-radio').prop('checked', true);
			$('#room-dropdown').show();
			$('#room-table').show();
			$('#event-radio').prop('checked', false);
			$('#event-dropdown').hide();
			$('#event-table').hide();
			$('#user-radio').prop('checked', false);
			$('#user-dropdown').hide();
			$('#user-table').hide();
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
							$("#"+selected.toLowerCase()+"-table").append(getEntryHTML(selected, data.results[i]));
						}
					}
					
				}).fail(function(error){console.log(error);});
		});

});


function getEntryHTML(type, entry){
	if(type === 'Event'){
		return [
		"<tr>",
			"<td>"+entry.eventName+"</td>",
			"<td>"+entry.startTime+"</td>",
			"<td>"+entry.endTime+"</td>",
			"<td>"+entry.location+"</td>",
			"<td>"+entry.host+"</td>",
			"<td>"+entry.description+"</td>",
			"<td>"+entry.type+"</td>",
		"</tr>",
		].join("\n");
	}else if(type === 'User'){
		return [
		"<tr>",
			"<td>"+entry.netID+"</td>",
			"<td>"+entry.firstName+"</td>",
			"<td>"+entry.lastName+"</td>",
			"<td>"+entry.email+"</td>",
			"<td>"+entry.phone+"</td>",
			"<td>"+entry.office+"</td>",
		"</tr>",
		].join("\n")
	}else if(type === 'Room'){
		return [
		"<tr>",
			"<td>"+entry.building+"</td>",
			"<td>"+entry.number+"</td>",
			"<td>"+entry.description+"</td>",
		"</tr>",
		].join("\n")
	}
}
