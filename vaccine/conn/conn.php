<?php
$conn = mysqli_connect('localhost', 'root', '', 'vaccine');
$conn->set_charset('utf8');
if (!$conn) {
       die('Could not connect: ' . mysql_error());
}
?>
