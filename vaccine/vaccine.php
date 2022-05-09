<?php
  require_once "conn/conn.php";
  $sql = "SELECT * FROM v_vaccine";
  $query = mysqli_query($conn,$sql);
  $result_list = array();
  while($row = mysqli_fetch_array($query)) {
    $result_list[] = $row;
  }
  if(isset($_POST['submit'])){ 
    session_start();
    $_SESSION['statusdelectvaccine'] = true;
    $iduser = $_SESSION['id'];
    $idvaccine = $_POST['id'];
    $_SESSION['vaccine'] = $_POST['vaccine'];
    $_SESSION['effect'] = $_POST['effect'];
    $d = strtotime("+1 Week");
    $data1 = date("Y-m-d", $d);
    $_SESSION['date1'] =$data1;
    $d = strtotime("+4 Week");
    $data2 = date("Y-m-d", $d);
    $_SESSION['date2'] =$data2;
    $amount = $_POST['amount'];
    $_SESSION['amount'] = $amount;
    $_SESSION['idvaccine'] = $idvaccine;
    $sql = "ALTER TABLE v_data auto_increment = 1";
    $query = mysqli_query($conn,$sql);
    $sql = "SELECT * FROM v_data WHERE v_iduser = '$iduser'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
    if($result){
      echo "<h4>คุณได้จองวัคซีนแล้ว ต้องการยกเลิกของเก่า <a href=\"index.php?page=delectvaccine\">กดตรงนี้<--</a></h4>";
      echo "<h4>คุณได้จองวัคซีนแล้ว ไม่ต้องการ <a href=\"index.php?page=vaccine\"> กดตรงนี้<-- </a></h4>";
    }else{
      $amount -= 2;
      $sql = "INSERT INTO v_data (v_iduser,v_idvaccine,date1,date2) VALUES ('$iduser','$idvaccine','$data1','$data2')";
      $query = mysqli_query($conn,$sql);

      $sql = "UPDATE `v_vaccine` SET v_amount ='$amount' WHERE v_id = '$idvaccine'";
      $query = mysqli_query($conn,$sql);
      header('refresh:1;url=../vaccine/index.php?page=vaccine');
    }
    ?>


<?php }

else if($_SESSION['statusdelectvaccine']){ 

 
require_once "delectvaccine.php";

}else{
?>
<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>Vaccine-19 ( วัคซีนโควิด-19 )</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ผู้ผลิต</th>
            <th style="width: 100px;">ประสิทธิภาพ</th>
            <th style="width: 130px;">อายุที่ฉีดได้</th>
            <th>จำนวนโดส</th>
            <th>ผลข้างเคียง</th>
            <th style="width: 80px;">ตัวเลือก</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $row["v_name"]?></td>
            <td><?= $row["v_producer"]?></td>
            <td>
                <p class="mb-1" style="font-size: .77rem;"><?= $row["v_effect"]?></p>
                <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: <?= $row["v_effect"]?>"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </td>
            <td><?= $row["v_minage"]?></td>
            <td><?= $row["v_detail"]?></td>
            <td><?= $row["v_seffects"]?></td>
            <td>
                <?php if($row["v_name"] == "Shinovac" && ($_SESSION["age"]<18 || $_SESSION["age"]>60) ){ ?>

                <button type="button" class="btn btn-primary" disabled>
                    จอง
                </button>


                <?php }else if($_SESSION["age"]<18){ ?>

                <button type="button" class="btn btn-primary" disabled>
                    จอง
                </button>

                <?php }else if($row["v_amount"] < 1){ ?>


                <button type="button" class="btn btn-primary" disabled>
                    จอง
                </button>

                <?php }else{ ?>

                <form action="vaccine.php" method="POST">
                    <input type="text" class="btn btn-primary" name="id" value="<?= $row["v_id"]?>"
                        style="display:none;">
                        <input type="text" class="btn btn-primary" name="amount" value="<?= $row["v_amount"]?>" style="display:none;">
                    <input type="text" class="btn btn-primary" name="vaccine" value="<?= $row["v_name"]?>" style="display:none;">
                    <input type="text" class="btn btn-primary" name="effect" value="<?= $row["v_effect"]?>" style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="จอง">
                </form>


                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php } ?>