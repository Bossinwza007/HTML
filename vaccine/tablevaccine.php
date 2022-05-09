<?php

    require_once "conn/conn.php";

    $sql = "SELECT * FROM v_vaccine";
    $query = mysqli_query($conn, $sql);
    $result_list = array();
    while($row = mysqli_fetch_array($query)) {
        $result_list[] = $row;
      }
      if(isset($_POST['submit'])){
          session_start();
          $_SESSION['idedit'] = $_POST['edit'];
          echo "<h4>Go to Edit!</h4>";
          header('refresh:1;url=../vaccine/index.php?page=editvaccine');

      }else if(isset($_POST['delects'])){
        $delect = $_POST['delect'];
        if(!$delect){
              echo "<h4>Delect is Error! <a href=\"index.php?page=tablevaccine\"> Try Again</a></h4>";
        }else{
            $sql = "DELETE FROM v_vaccine WHERE v_id = '$delect'";
            $query = mysqli_query($conn, $sql);
            header('refresh:1;url=../vaccine/index.php?page=tablevaccine');
        }
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
            <th style="width: 180px;">ตัวเลือก</th>
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
            <form action="tablevaccine.php" method="POST" style="float: left;margin-right:10px;">
                    <input type="text" class="btn btn-outline-danger" name="edit" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-danger" name="submit" value="Edit">
                </form>
            <form action="tablevaccine.php" method="POST">
                <input type="text" class="btn btn-outline-danger" name="delect" value="<?= $row['v_id']?>"
                        style="display:none;">
                <input type="submit" class="btn btn-outline-danger" name="delects" value="Delect">
            </form>

            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php } ?>