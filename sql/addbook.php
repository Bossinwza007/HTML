<?php
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "itbook"; 
$conn = mysqli_connect( $hostname, $username, $password,$dbname ); 
if ( ! $conn )   
die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
mysqli_set_charset( $conn,"Utf-8");

function GetTypeSelect($ID){   
    global $conn;
    $sql = "SELECT * FROM book ORDER BY TypeID";
    $dbquery = mysqli_query($sql, $conn);
    if (!$dbquery) die("(FunctionDB:GetTypeSelect) SELECT typebook มีข้อผิดพลาด".mysql_error());
    echo "<option value=\"\">เลือกประเภทหนังสือ</option>";
    while($result=mysql_fetch_object($dbquery)){
        if($result->TypeID==$ID){
             //ถ้าข้อมูลที่เลือกตรงกับข้อมูลในตารางให้เลือกรายการนั้น
             echo "<option value=\"$result->TypeID\" selected> ";
             echo "$result->TypeName</option>\n";
             }else {
                  //แต่ถ้าไม่ใช่ก็จะแสดงรายการตามฐานข้อมูล
                  echo "<option value=\"$result->TypeID\">";
                  echo "$result->TypeName</option>\n";
                  }
                  }
                  }// ฟังก์ชั่นแสดงสถานะ
                  function GetStatusSelect($ID) {   
                      global $conn;$sql = "SELECT * FROM statusbook ORDER BY StatusID";
                      $dbquery = mysql_query($sql,$conn);
                      if (!$dbquery) die("(FunctionDB:GetStatusSelect) SELECT status มีข้อผิดพลาด".mysql_error());
                      echo "<option value=\"\">เลือกสถานะ</option>\n";
                      while($result=mysql_fetch_object($dbquery)){
                          if ($result->StatusID==$ID){
                              echo "<option value=\"$result->StatusID\" selected> ";
                              echo "$result->StatusName</option>\n";
                              }else{
                                  echo "<option value=\"$result->StatusID\">";
                                  echo "$result->StatusName</option>\n";}
                                  }}
                                ?>
<html>

<head>
    <title>เพิ่มข้อมูลหนังสือ</title>
</head>

<body>
    <form enctype="multipart/form-data" name="save" method="post" action="savebook.php"><BR><BR>
        <table width="650" border="1" bgcolor="#FFFFFF" align="center">
            <tr>
                <td colspan="6" bgcolor="#3399CC" align="center" height="21"><b>: : เพิ่มข้อมูลหนังสือ : : </td>
            </tr>
            <tr>
                <td width="200">รหัสหนังสือ : </td>
                <td width="400"><input type="text" name="BookID" size="10" maxlength="5"> </td>
            </tr>
            <tr>
                <td width="200">ชื่อหนังสือ :</td>
                <td><input type="text" name="BookName" size="50" maxlength="50"> </td>
            </tr>
            <tr>
                <td width="200">ประเภทหนังสือ : </td>
                <td><select name="TypeID">
                <option value="001"> 001 </option>
                <option value="002"> 002 </option>
                <option value="003"> 003 </option>
                    </select></td>
            </tr>
            <tr>
                <td width="200">สถานะหนังสือ : </td>
                <td> <select name="StatusID">
                <option value="01"> 01 </option>
                <option value="02"> 02 </option>
                <option value="03"> 03 </option>
                    </select></td>
            </tr>
            <tr>
                <td width="200">สำนักพิมพ์ :</td>
                <td><input type="text" name="Publish" maxlength="25" size="20"> </td>
            </tr>
            <tr>
                <td width="200">ราคาที่ซื้อ:</td>
                <td><input type="text" name="UnitPrice" maxlength="25" size="20"></td>
            </tr>
            <tr>
                <td width="200">ราคาที่เช่า:</td>
                <td><input type="text" name="UnitRent" size="20" maxlength="25"></td>
            </tr>
            <tr>
                <td width="200">จ านวนวันที่เช่า </td>
                <td> <input type="text" name="DayAmount" maxlength="25" size="20"></td>
            </tr>
            <tr>
                <td width="200">รูปภาพ</td>
                <td> 
                    <input type="hidden" name="max_size" value="900000">
                    <input type="file" name="ImageFile" size="30"><BR>

                    <font size=2 color=#FF3300>นามสกุล .gif หรือ .jpg และ .png (เท่านั้น)</font>
                </td>
            </tr>
        </table><BR>
        <div align="center">
            <input type="submit" name="Submit" value="บันทึกข้อมูล" style="cursor:hand"> 
            <input type="reset" name="Reset" value="ยกเลิก" style="cursor:hand"></div>
        </form>
</body>

</html>