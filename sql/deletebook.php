<?php 
    $id = $_GET['id'];
    $hostname = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "itbook"; 
    $conn = mysqli_connect( $hostname, $username, $password,$dbname ); 
    if ( ! $conn ) 
    die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_set_charset( $conn,"Utf-8");
    $sql = "DELETE FROM book  WHERE BookID = '$id'";
    mysqli_query($conn,$sql)  or die ( "DELETE จาตาราง book มีข้อผิดพลาดเกิดขึ้น".mysql_error());
    mysqli_close ( $conn ); 
    header("Location:listofbook.php");
?>