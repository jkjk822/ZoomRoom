<nav class="navbar">
	<div class="navbar-right">
		<?php if($_COOKIE["loggedIn"]){ ?>
		<p class="navbar-text">Signed in as <?php echo "{$_COOKIE['loggedIn']}"?></p>
		<a href="logout.php"><button type="button" class="btn btn-default navbar-btn">Log Out</button></a>
		<?php } else{ ?>
		<a href="login.php">Login Here</a>
		<?php } ?>
	</div>
</nav>
