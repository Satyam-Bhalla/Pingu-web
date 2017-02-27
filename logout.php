<?php
if (isset($_SESSION['username'])) {
	session_destroy();
	header("Location: ./views/signin.html");
	exit;
} else {
	header("Location: index.html");
	exit;
}
 ?>
