<?php
    require_once "conn/conn.php";

    $id = $_POST["id"]; 
    $sql = "SELECT v_dose1, v_dose2 FROM v_data WHERE v_iduser = '$id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    if($result){
        $dose1_ = $result["v_dose1"];
        $dose2_ = $result["v_dose2"];
    }
    $dose1 = $_POST["dose1"] ?? $dose1_;
    $dose2 = $_POST["dose2"] ?? $dose2_;
    $sql = "UPDATE v_data SET v_dose1='$dose1',v_dose2='$dose2' WHERE v_iduser = '$id'";
    mysqli_query($conn, $sql);
    echo "<h4>บันทึกข้อมูลเรียบร้อย</h4>";
    header('refresh:1;url=../vaccine/index.php?page=admin');
    
?>
