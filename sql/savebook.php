<?php 
    $hostname = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "itbook"; 
    $conn = mysqli_connect( $hostname, $username, $password,$dbname ); 
    if ( ! $conn )   
    die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_set_charset( $conn,"Utf-8");

    $BookID = $_POST["BookID"];
    $BookName = $_POST["BookName"];
    $TypeID = $_POST["TypeID"];
    $StatusID = $_POST["StatusID"];
    $Publish = $_POST["Publish"];
    $UnitPrice = $_POST["UnitPrice"];
    $UnitRent = $_POST["UnitRent"];
    $DayAmount = $_POST["DayAmount"];
    $max_size = $_POST["max_size"];
    $ImageFile = $_FILES['ImageFile']['name'];
    $Flag=true;
    if ($ImageFile=="")  {
        $image="-";
        echo "<B><CENTER><li>คุณไม่ได้เลือกรูปภาพ.</CENTER></B><BR>";
    }else {         
        $ImageFile_name = $_FILES['ImageFile']['name'];
        $ImageFile_type = $_FILES['ImageFile']['type'];
        $ImageFile_size = $_FILES['ImageFile']['size'];
        if($ImageFile_type=="image/gif" or $ImageFile_type=="image/jpeg" or $ImageFile_type=="image/png")  {
            if ($ImageFile_size <= $max_size) {
                move_uploaded_file($_FILES["ImageFile"]["tmp_name"],"Picture/".$ImageFile_name);
                $image = $ImageFile_name;
                $Flag=true;
            } else {
                echo "<CENTER><li>รูปภาพมีขนาดใหญ่กว่า 90 kb.<BR></CENTER>";
                echo "<CENTER><input type=\"button\" value=\"กลับไปแก้ไข\" ";
                echo "onclick=\"history.back();\" style=\"cursor:hand\"></CENTER>";
                $Flag=false;
            }
        }else {
            echo "<CENTER><li>รูปภาพไม่ใช่ไฟล์ประเภท GIF หรือ JPG <BR></CENTER>";
            echo "<CENTER><input type=\"button\" value=\"กลับไปแก้ไข\" ";
            echo "onclick=\"history.back();\" style=\"cursor:hand\"></CENTER>";
            $Flag=false;}
        }if($Flag){
            $BDate = date("Y-m-d");
            $sql = "INSERT INTO book (BookID,BookName,TypeID,StatusID,Publice,UnitPrice,UnitRant,DayAmount,Picture,BookData) VALUES ('$BookID','$BookName','$TypeID','$StatusID', '$Publish', '$UnitPrice','$UnitRent','$DayAmount','$image','$BDate')";
            mysqli_query($conn,$sql) or die("INSERT ลงตาราง book มีข้อผิดพลาดเกิดขึ้น".mysqli_error());
            echo "<br><br><CENTER><H2>บันทึกข้อมูลเรียบร้อย</H2><BR><BR></CENTER>";
            echo  "<CENTER><A HREF=\"listofbook.php\">แสดงข้อมูลทั้งหมด</A></CENTER>";
        }
            mysqli_close($conn);
?>