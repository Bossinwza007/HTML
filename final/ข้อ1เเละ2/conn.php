<?php  

    $hostname = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "bookstore"; 
    $conn = mysqli_connect( $hostname,$username, $password,$dbname ); 
    $conn->set_charset('utf8');

?>