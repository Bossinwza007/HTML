<?php

    require_once "conn/conn.php";
    $iduser = $_SESSION['id'] ?? '';
    if($_SESSION['status'] =="admin"){
        
    }
    if($iduser ==''){

    }else{
    $sql = "SELECT v_data.v_id,v_user.v_fname,v_vaccine.v_name,v_vaccine.v_effect,v_vaccine.v_minage,v_data.v_amount,v_data.date1,v_data.date2,v_data.v_dose1,v_data.v_dose2 FROM v_data INNER JOIN v_user ON v_data.v_iduser = v_user.v_id INNER JOIN v_vaccine ON v_data.v_idvaccine = v_vaccine.v_id WHERE v_user.v_id = '$iduser'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
    }
    if(isset($_POST['submit'])){
        session_start();
        unset($_SESSION['vaccine']);
        unset($_SESSION['effect']);
        $_SESSION['statusdelectvaccine'] = false;
        $idvaccine = $_SESSION['idvaccine'];
        $iddata = $_POST['id'];
        $sql = "DELETE FROM `v_data` WHERE v_id = '$iddata'";
        $query = mysqli_query($conn,$sql);
        $sql = "SELECT v_amount FROM v_vaccine WHERE v_id = '$idvaccine'";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        $amount = $result['v_amount'];
        $amount +=2;
        $sql = "UPDATE `v_vaccine` SET v_amount ='$amount' WHERE v_id = '$idvaccine'";
        $query = mysqli_query($conn,$sql);
        unset($_SESSION['idvaccine']);
        unset($_SESSION['date1']);
        unset($_SESSION['date2']);
        echo "<h4>Delect success</h4>";
        header('refresh:1;url=../vaccine/index.php?page=vaccine');
        
    }else{
?>


<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>Status Vaccine-19 ( สถาณะ วัคซีนโควิด-19 )</h1>
    <h4>!ยกเลิกได้ภายใน 1 วัน!</h4>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ชื่อวัคซีน</th>
            <th>ประสิทธิภาพ</th>
            <th>อายุที่ฉีดได้</th>
            <th>จำนวนโดส</th>
            <th>วัน เข็ม 1</th>
            <th>วัน เข็ม 2</th>
            <th>เพิ่มเติม</th>
        </thead>
        <tr>
            <td><?= $result["v_fname"]?></td>
            <td><?= $result["v_name"]?></td>
            <td><?= $result["v_effect"]?></td>
            <td><?= $result["v_minage"]?></td>
            <td><?= $result["v_amount"]?></td>
            <td><?= $result["date1"]?></td>
            <td><?= $result["date2"]?></td>
            <td><?php if($result["v_dose1"] == "ฉีดแล้ว"){?>
                สถานะเข็ม 1 <?= $result["v_dose1"]?> สถานะเข็ม 2 <?= $result["v_dose2"]?>
            <?php }else{ ?>
                <form action="delectvaccine.php" method="POST">
                    <input type="text" class="btn btn-primary" name="id" value="<?= $result["v_id"]?>"
                        style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="ยกเลิกการจอง">
                </form>
                <?php } ?>
            </td>
        </tr>
    </table>


</div>
<?php } ?>