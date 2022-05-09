<HTML>
<?php

    $id = $_GET['id'];
    require_once "conn.php";
    $sql1 = "SELECT * from book where bookId = $id";
    $result = mysqli_query($conn,$sql1);
    $data = mysqli_fetch_array($result);
    $image = "<img src=\"pictures/".$data["picture"]."\" align =\"center\" width=\"200\" height =\"200\" style=\"padding:30px\">";
    $sql2 = "SELECT * FROM typebook ORDER BY typeId";
    $dbquery1 = mysqli_query($conn,$sql2);
    $sql3 = "SELECT * FROM statusbook ORDER BY statusId";
    $dbquery2 = mysqli_query($conn,$sql3);
if(isset($_POST['delectpirture'])){
    $sql = "UPDATE book SET picture ='' WHERE bookId = '$id'";
    $query = mysqli_query($conn,$sql);
    header('Location:editBook.php?id='.$id);
}

if(isset($_POST['submit'])){
  
    $BookID = $_POST['BookID'];
    $BookName = $_POST["BookName"];
    $TypeID = $_POST["tylebook"];
    $StatusID = $_POST["statusbook"];
    $Publish = $_POST["Publish"];
    $UnitPrice = $_POST["UnitPrice"];
    $UnitRent = $_POST["UnitRent"];
    $DayAmount = $_POST["DayAmount"];
    $max_size = $_POST["max_size"];
    $ImageFile = $_FILES['ImageFile']['name'];

    
    $Flag=true;
    if ($ImageFile=="")  {
        $image=null;
        echo "<B><CENTER><li>คุณไม่ได้เลือกรูปภาพ.</CENTER></B><BR>";
    }else {         
        $ImageFile_name = $_FILES['ImageFile']['name'];
        $ImageFile_type = $_FILES['ImageFile']['type'];
        $ImageFile_size = $_FILES['ImageFile']['size'];
        if($ImageFile_type=="image/gif" or $ImageFile_type=="image/jpeg")  {
            if ($ImageFile_size <= $max_size) {
                move_uploaded_file($_FILES["ImageFile"]["tmp_name"],"pictures/".$ImageFile_name);
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
            $sql = "UPDATE book SET bookId = '$BookID' ,bookName='$BookName',typeId='$TypeID',statusId='$StatusID',publish='$Publish',unitPrice='$UnitPrice',unitRent='$UnitRent',dayAmount='$DayAmount',picture='$image',`bookDate`='$BDate' WHERE bookId = '$id'";
            mysqli_query($conn,$sql);
            echo "<br><br><CENTER><H2>แก้ไขข้อมูลหนังสือรหัส".$id."เรียบร้อย</H2><BR><BR></CENTER>";
            echo  "<CENTER><A HREF=\"listofbook.php\">แสดงข้อมูลทั้งหมด</A></CENTER>";
        }
            mysqli_close($conn);

}else{
?>
</HTML>
<HEAD>
    <TITLE>Show Data Book</TITLE>
</HEAD>

<body>
    <form enctype="multipart/form-data" name="save" method="post" action="editBook.php?id=<?=$id?>"><BR><BR>
        <table width="650" border="1" bgcolor="#FFFFFF" align="center">
            <tr>
                <td colspan="6" bgcolor="#3399CC" align="center" height="21"><b>: : แก้ไขข้อมูลหนังสือ : : </td>
            </tr>
            <tr>
                <td width="200">รหัสหนังสือ : </td>
                <td width="400"><input type="text" name="BookID" size="10" maxlength="5" value="<?=$data["bookId"]?>"> </td>
            </tr>
            <tr>
                <td width="200">ชื่อหนังสือ :</td>
                <td><input type="text" name="BookName" size="50" maxlength="50"  value="<?=$data["bookName"]?>"> </td>
            </tr>
            <tr>
                <td width="200">ประเภทหนังสือ : </td>
                <td><select name="tylebook">
                    <?php while($result= mysqli_fetch_array($dbquery1)){ 
                        if($result["typeId"] == $data["typeId"]){
                        ?>
                        <option value="<?=$result["typeId"]?>" selected><?=$result["typeName"]?></option>
                        
                    <?php }else{?>
                        <option value="<?=$result["typeId"]?>"><?=$result["typeName"]?></option>
                   <?php }} ?>
                </select>
                </td>

                    
            </tr>
            <tr>
                <td width="200">สถานะหนังสือ : </td>
                <td> <select name="statusbook">
                    <?php while($result= mysqli_fetch_array($dbquery2)){ 
                        if($result["statusId"] == $data["statusId"]){
                            ?>
                            <option value="<?=$result["statusId"]?>" selected><?=$result["statusName"]?></option>
                            
                        <?php }else{?>
                            <option value="<?=$result["statusId"]?>"><?=$result["statusName"]?></option>
                       <?php }} ?>
                </select>
            </td>
            </tr>
            <tr>
                <td width="200">สำนักพิมพ์ :</td>
                <td><input type="text" name="Publish" maxlength="25" size="20" value="<?=$data["publish"]?>"> </td>
            </tr>
            <tr>
                <td width="200">ราคาที่ซื้อ:</td>
                <td><input type="text" name="UnitPrice" maxlength="25" size="20" value="<?=$data["unitPrice"]?>"></td>
            </tr>
            <tr>
                <td width="200">ราคาที่เช่า:</td>
                <td><input type="text" name="UnitRent" size="20" maxlength="25" value="<?=$data["unitRent"]?>"></td>
            </tr>
            <tr>
                <td width="200">จำนวนวันที่เช่า </td>
                <td> <input type="text" name="DayAmount" maxlength="25" size="20" value="<?=$data["dayAmount"]?>"></td>
            </tr>
            <tr>
                <td width="200">รูปภาพ</td>
                <td> 
                <?php if($data["picture"]){?>
                    <input type="text" name="Image" value="<?=$data["picture"]?>">
                    <input type="submit" name="delectpirture" value="ลบรูปภาพ"><BR>
                        <?= $image?>
                    <?php }else{ ?>

                        <input type="hidden" name="max_size" value="900000">
                        <input type="file" name="ImageFile" size="30"><BR>

                        <font size=2 color=#FF3300>นามสกุล .gif หรือ .jpg (เท่านั้น)</font>
                    <?php } ?>
                    
                </td>
            </tr>
        </table><BR>
        <div align="center">
            <input type="submit" name="submit" value="บันทึกข้อมูล" style="cursor:hand"> 
            <input type="reset" name="reset" value="ยกเลิก" style="cursor:hand"></div>
        </form>
</body>

</html>
<?php } ?>