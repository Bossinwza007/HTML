<?php

    require_once "conn/conn.php";

    $sql = "SELECT v_data.v_dose1,v_data.v_dose2,v_user.v_id,v_data.v_amount,v_vaccine.v_name,v_user.v_age,v_vaccine.v_effect,v_data.date1,v_data.date2,v_user.v_fname FROM v_data INNER JOIN v_vaccine ON v_data.v_idvaccine = v_vaccine.v_id INNER JOIN v_user ON v_data.v_iduser = v_user.v_id";
    $query = mysqli_query($conn, $sql);
    $result_list = array();
    while($row = mysqli_fetch_array($query)) {
        $result_list[] = $row;
      }
if(isset($_POST['delectvaccine'])){
 $delect = $_POST['delect'];
 $sql = "DELETE FROM `v_data` WHERE v_iduser = '$delect'";
 $query = mysqli_query($conn,$sql);
 header('refresh:1;url=../vaccine/index.php?page=admin');
}else{
    
?>


<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>Status Vaccine-19 ( สถานะ วัคซีนโควิด-19 )</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ชื่อวัคซีน</th>
            <th>อายุ</th>
            <th>จำนวนโดส</th>
            <th>วัน เข็ม 1</th>
            <th style="width: 250px;">ตัวเลือก</th>
            <th>วัน เข็ม 2</th>
            <th style="width: 250px;">ตัวเลือก</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $row['v_fname']?></td>
            <td><?= $row['v_name']?></td>
            <td><?= $row['v_age']?></td>
            <td><?= $row['v_amount']?></td>
            <td><?= $row['date1']?></td>
            <td>
            <?php if($row['v_dose1'] == "ฉีดแล้ว"){ ?>
                <?= $row['v_dose1']?>
            <?php }else{?>
                <form action="allow.php" method="post" style="float: left;margin-right:10px;">
                    <input type="text" class="btn btn-outline-success" name="id" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="text" class="btn btn-outline-success" name="dose1" value="ฉีดแล้ว"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-success" name="submit" value="อนุญาต">
                </form>
                
                <form action="admin.php" method="POST">
                    <input type="text" class="btn btn-outline-danger" name="delect" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-danger" name="delectvaccine" value="ยกเลิกการจอง">
                </form>
                <?php }?>
            </td>
            <td><?= $row['date2']?></td>
            <td>
            <?php if($row['v_dose2'] == "ฉีดแล้ว"){ ?>
                            <?= $row['v_dose2']?>
                            <?php }else{?>
                <form action="allow.php" method="POST" style="float: left;margin-right:10px;">
                    <input type="text" class="btn btn-outline-success" name="id" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="text" class="btn btn-outline-success" name="dose2" value="ฉีดแล้ว"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-success" name="submit" value="อนุญาต">
                </form>
                <?php } ?>
                <?php if($row['v_dose1'] == "ฉีดแล้ว"){ ?>
                        
                <?php }else{?>
                    <form action="admin.php.php" method="POST">
                    <input type="text" class="btn btn-outline-danger" name="delect" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-danger" name="delectvaccine" value="ยกเลิกการจอง">
                </form>
                    <?php }?>
            </td>
        </tr>
        <?php } ?>
    </table>


</div>
<?php }?>