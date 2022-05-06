<?php

    require_once "conn/conn.php";

    $sql = "SELECT * FROM v_user";
    $query = mysqli_query($conn, $sql);
    $result_list = array();
    while($row = mysqli_fetch_array($query)) {
        $result_list[] = $row;
      }
      if(isset($_POST['submit'])){
          $delect = $_POST['delect'];
          if(!$delect){
                echo "<h4>Delect is Error! <a href=\"index.php?page=tableuser\"> Try Again</a></h4>";
          }else{
              $sql = "DELETE FROM v_user WHERE v_id = '$delect'";
              $query = mysqli_query($conn, $sql);
              echo "<h4>Delect Success!</h4>";
              header('refresh:1;url=../vaccine/index.php?page=tableuser');
          }
      }else{
?>


<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>Status Vaccine-19 ( สถานะ วัคซีนโควิด-19 )</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>อีเมล</th>
            <th>อายุ</th>
            <th>เพศ</th>
            <th>เบอร์โทร</th>
            <th>password</th>
            <th>status</th>
            <th>ตัวเลือก</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $row['v_fname']?> <?= $row['v_lname']?></td>
            <td><?= $row['v_email']?></td>
            <td><?= $row['v_age']?></td>
            <td><?= $row['v_sex']?></td>
            <td><?= $row['v_phone']?></td>
            <td><?= $row['v_password']?></td>
            <td><?= $row['v_status']?></td>
            <td>
                <form action="tableuser.php" method="POST">
                    <input type="text" class="btn btn-outline-danger" name="delect" value="<?= $row['v_id']?>"
                        style="display:none;">
                    <input type="submit" class="btn btn-outline-danger" name="submit" value="ลบ">
                </form>
                </td>
        </tr>
        <?php } ?>
    </table>


</div>
<?php } ?>