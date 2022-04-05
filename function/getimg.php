<?php
    print_r($_FILES);
    $ImageFile = $_FILES['ImageFile']['name'];
    $MAX_FILE_SIZE = $_POST['MAX_FILE_SIZE'];

    if(isset($ImageFile)) {
        $ImageFile_name = $_FILES['ImageFile']['name'];
        $ImageFile_type = $_FILES['ImageFile']['type'];
        $ImageFile_size = $_FILES['ImageFile']['size'];
        echo"<br><h3>File name : " . $ImageFile_name . "</h3><br>";
        echo "<h3>File type : " . $ImageFile_type . "</h3><br>";
        echo "<h3>File size : " . $ImageFile_size . "</h3><br>";
        if($ImageFile_type=="image/gif" or $ImageFile_type=="image/jpeg"){
            if($ImageFile_size <= $MAX_FILE_SIZE){
                  copy($ImageFile,"pictures/$ImageFile_name");
                  @unlink($ImageFile);
                  echo "<li><h3>บันทึกข้อมูลเรียบร้อย<br>";
                  echo  "<a href='throwimg.html'><h3>กลับไป upload </a><br>";
                  echo  "<image src='pictures/$ImageFile_name' width='320' height='240' style=\"margin-top:40px;\">";
                }else {
                    echo "<li><h3>รูปภาพมีขนาดใหญ่กว่า 500 kb.<br>";
                    echo "<input type=\"button\" value=\"กลับไปแก้ไข\" ";
                    echo "onclick= \"history.back();\" style=\"cursor:hand\">";
                } 
            }else {
                echo "<li><h3>รูปภาพไม่ใช่ไฟล์ประเภท GIF หรือ JPG <br>";
                echo "<input type=\"button\" value=\"กลับไปแก้ไข\" ";
                echo "onclick= \"history.back();\" style=\"cursor:hand\">";
            }
        }
?>
