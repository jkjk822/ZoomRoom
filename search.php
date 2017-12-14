<!doctype html>

<html lang="en">

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="js/searchQuery.js"></script>

	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Search Events</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Search for events, users, or rooms:</h2>

	<form action="searchQuery.php" method="post">
		<div class="search-bars">
			<div class="search-bar-radio">
				<a>Search for:</a>
				<input type="radio" id="event-radio" name="type" value="event" checked="checked">
				<label for="event"><span></span>Event</label>

				<input type="radio" id="user-radio" name="type" value="user">
				<label for="user"><span></span>User</label>

				<input type="radio" id="room-radio" name="type" value="room">
				<label for="room"><span></span>Room</label>
			</div><!-- search-bar-radio -->

			<br>

			<div class="search-bar-dropdown">
				<a>Search by:</a>

				<select id="event-dropdown">
					<option value="eventName">Name</option>
					<option value="startTime">Starts</option>
					<option value="endTime">Ends</option>
					<option value="location">Room</option>
					<option value="host">Host</option>
					<option value="type">Type</option>
					<option value="eventID">Event ID</option>
				</select>

				<select id="user-dropdown">
					<option value="firstName">First Name</option>
					<option value="lastName">Last Name</option>
					<option value="office">Office</option>
					<option value="phone">Phone Number</option>
					<option value="email">Email</option>
					<option value="netID">netID</option>
				</select>

				<select id="room-dropdown">
					<option value="building">Building</option>
					<option value="roomID">Room ID</option>
				</select>

				<input type="search" name="user-input">
				<input type="submit" value="Search" class="button">
			</div><!-- search-bar-dropdown -->
		</div><!-- search-bars -->
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
			<td>Featured Speaker</td>
			<td>Monday 11/13, 5:00 PM</td>
			<td>Monday 11/13, 6:00 PM</td>
			<td>CSB 703</td>
			<td>Data Science Department</td>
			<td>Seminar on featured speaker</td>
			<td>Presentation</td>
		</tr>
	</table>

	<br>

	<table>
		<tr>
			<th>User</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Office</th>
		</tr>
		<tr>
			<td>UR SA</td>
			<td>Unlisted</td>
			<td>sa@u.rochester.edu</td>
			<td>585-273-3333</td>
		</tr>
		<tr>
			<td>Robotics Club</td>
			<td>Unlisted</td>
			<td>robo@u.rochester.edu</td>
			<td>585-453-2343</td>
		</tr>
	</table>

	<br>

	<table>
		<tr>
			<th>Building</th>
			<th>Room Number</th>
			<th>Capacity</th>
		</tr>
		<tr>
			<td>Wegmans</td>
			<td>2107</td>
			<td>20</td>
		</tr>
		<tr>
			<td>Wegmans</td>
			<td>1400</td>
			<td>150</td>
		</tr>
		<tr>
			<td>Gavett</td>
			<td>301</td>
			<td>50</td>
		</tr>
	</table>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>