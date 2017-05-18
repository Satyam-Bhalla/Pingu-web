 <?php
 session_start();
 if (isset($_SESSION['username'])) {
	 session_destroy();
	 header("Location: http://localhost/Offline-chat-app/login.php");
	exit;
} else {
	header("Location: http://localhost/Offline-chat-app/login.php");
	exit;
}
?>
