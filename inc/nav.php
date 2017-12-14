<nav class="navbar">
	<ul class="navbar-right">

		<?php if($_COOKIE["loggedIn"]){ ?>
		<a href="home.php" class="navbar-links">Home</a>
		<a href="view-events.php" class="navbar-links">View Events</a>
		<a href="my-events.php" class="navbar-links">My Events</a>
		<a href="create-event.php" class="navbar-links">Create Event</a>
		<a href="manage-account.php" class="navbar-links">Manage Account</a>
		<a class="navbar-text">Signed in as <?php echo "{$_COOKIE['loggedIn']}"?></a>
		<a href="logout.php"><button type="button" class="button">Log Out</button></a>
		<?php } else{ ?>
		<a class="navbar-text">You are not signed in.</a>
		<a href="login.php"><button type="button" class="button">Login</button></a>
		<?php } ?>
	</ul>
</nav>
