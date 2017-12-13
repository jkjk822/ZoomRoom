<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Search Events</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Search for events, staff, or hosts:</h2>

	<form method="post">
		<div id="search-for">
			<a>Search for:</a>
			<input type="radio" id="event" name="type" value="event">
			<label for="event">Event</label>

			<input type="radio" id="staff" name="type" value="staff">
			<label for="staff">Staff</label>

			<input type="radio" id="host" name="type" value="host">
			<label for="host">Host</label>
		</div><!-- search-for -->

		<br>

		<div id="search-by">
			<a>Search by:</a>

			<select>
				<option value="event-name">Name</option>
				<option value="event-starts">Starts</option>
				<option value="event-ends">Ends</option>
				<option value="event-room">Room</option>
				<option value="event-host">Host</option>
				<option value="event-type">Type</option>
			</select>

			<select>
				<option value="staff-name">Name</option>
				<option value="staff-phone">Phone Number</option>
				<option value="staff-office">Office</option>
			</select>
			
			<select>
				<option value="host-name">Name</option>
				<option value="host-email">Email</option>
				<option value="host-phone">Phone Number</option>
			</select>
		</div><!-- search-by -->

		<br>

		<input type="search" name="user-input">
		<input type="submit" value="Search" class="button">
	</form>

	<br><br>
	<table>
		<tr>
			<th>Event Name</th>
			<th>Starts</th>
			<th>Ends</th>
			<th>Room</th>
			<th>Host</th>
			<th>Description</th>
			<th>Type</th>
		</tr>
		<tr>
			<td>Event 1</td>
			<td>Start time</td>
			<td>End time</td>
			<td>Room 2</td>
			<td>Host 3</td>
			<td>Description 4</td>
			<td>Type 5</td>
		</tr>
		<tr>
			<td>Cooler Event</td>
			<td>Monday 11/13, 5:00 PM</td>
			<td>CSB 703</td>
		</tr>
	</table>

	<br>

	<table>
		<tr>
			<th>Staff</th>
			<th>Phone Number</th>
			<th>Office</th>
		</tr>
		<tr>
			<td>Tamal Biswas</td>
			<td>585-275-9499</td>
			<td>Wegmans 2107</td>
		</tr>
		<tr>
			<td>Other Guy</td>
			<td>Unlisted</td>
			<td>Wegmans Basement</td>
		</tr>
	</table>

	<br>

	<table>
		<tr>
			<th>Host</th>
			<th>Email</th>
			<th>Phone Number</th>
		</tr>
		<tr>
			<td>UR SA</td>
			<td>sa@u.rochester.edu</td>
			<td>585-273-3333</td>
		</tr>
		<tr>
			<td>Robotics Club</td>
			<td>robo@u.rochester.edu</td>
			<td>585-453-2343</td>
		</tr>
	</table>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>