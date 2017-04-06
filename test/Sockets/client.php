<?php
$server = '127.0.0.1';
$port = 9999;
if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0))) {
$errorcode = socket_last_error();
$errormsg = socket_strerror($errorcode);
echo "Couldn't create socket: [$errorcode] $errormsg<br>";
} else {
socket_sendto($sock, $msg , strlen($msg) , 0 , $server , $port);
}
?>