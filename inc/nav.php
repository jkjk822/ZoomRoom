<nav class="navbar">
	<ul class="navbar-right">
		<?php if($_COOKIE["loggedIn"]){ ?>
		<a class="navbar-text">Signed in as <?php echo "{$_COOKIE['loggedIn']}"?></a>
		<a href="logout.php"><button type="button" class="button">Log Out</button></a>
		<?php } else{ ?>
		<a class="navbar-text">You are not signed in.</a>
		<a href="login.php"><button type="button" class="button">Login</button></a>
		<?php } ?>
	</ul>
</nav>
