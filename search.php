<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Search Events</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Search for events, users, or rooms:</h2>

	<form method="post">
		<div class="search-bars">
			<div class="search-bar-radio">
				<a>Search for:</a>
				<input type="radio" id="event" name="type" value="event" checked="checked">
				<label for="event"><span></span>Event</label>

				<input type="radio" id="user" name="type" value="user">
				<label for="user"><span></span>User</label>

				<input type="radio" id="room" name="type" value="room">
				<label for="room"><span></span>Room</label>
			</div><!-- search-bar-radio -->

			<br>

			<div class="search-bar-dropdown">
				<a>Search by:</a>

				<select>
					<option selected="true" disabled="disabled">Event</option>
					<option value="event-name">Name</option>
					<option value="event-starts">Starts</option>
					<option value="event-ends">Ends</option>
					<option value="event-room">Room</option>
					<option value="event-host">Host</option>
					<option value="event-type">Type</option>
					<option value="event-id">Event ID</option>
				</select>

				<select>
					<option selected="true" disabled="disabled">User</option>
					<option value="user-name">Name</option>
					<option value="user-department">Department</option>
					<option value="user-office">Office</option>
					<option value="user-phone">Phone Number</option>
					<option value="user-email">Email</option>
					<option value="user-netid">netID</option>
				</select>

				<select>
					<option selected="true" disabled="disabled">Room</option>
					<option value="room-building">Building</option>
					<option value="room-capacity">Capacity</option>
					<option value="room-id">Room ID</option>
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