<HTML>

</HTML>
<HEAD>
    <TITLE>Show Data Book</TITLE>
</HEAD>

<BODY>
    <?php
    require_once "conn.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT * from book where BookID = $id") or die(mysqli_error($conn));
    $data = mysqli_fetch_array($result);
    if($data["picture"] == null || !$data["picture"]){
        $image = "<h4>ไม่มีรูป</h4>";
    }else{
        $image = "<img src=\"pictures/".$data["picture"]."\" align =\"center\" width=\"200\" height =\"200\" style=\"padding:30px\">";
    }
    $sql2 = "SELECT * FROM typebook ORDER BY typeId";
    $dbquery1 = mysqli_query($conn,$sql2);
    $sql3 = "SELECT * FROM statusbook ORDER BY statusId";
    $dbquery2 = mysqli_query($conn,$sql3);
    while($result= mysqli_fetch_array($dbquery1)){ 
        if($result["typeId"] == $data["typeId"]){
            $type = $result["typeName"];
        }
    }
    while($result= mysqli_fetch_array($dbquery2)){ 
        if($result["statusId"] == $data["statusId"]){
            $status = $result["statusName"];
        }
    }
    echo "<table border=1 align=center bgcolor=#FFCCCC>";
    echo "<tr><td align=center colspan = 2bgcolor =#FF99CC><B>แสดงรายละเอียดหนังสือ</B></td></tr>";
    echo "<tr><td> รหัสหนังสือ : </td><td>".$data["bookId"]."</td></tr>";
    echo "<tr><td> ชื่อหนังสือ  : </td><td>".$data["bookName"]."</td></tr>";
    echo "<tr><td> ประเภทหนังสือ  : </td><td>".$type."</td></tr>";
    echo "<tr><td> สถานะหนังสือ   : </td><td>".$status."</td></tr>";
    echo "<tr><td> สำนักพิมพ์  : </td><td>".$data["publish"]."</td></tr>";
    echo "<tr><td> ราคาซื้อ  : </td><td>".$data["unitPrice"]."</td></tr>";
    echo "<tr><td> ราคาเช่า  : </td><td>".$data["unitRent"]."</td></tr>";
    echo "<tr><td> รูปภาพ  : </td><td>".$data["picture"]."<br>".$image."</td></tr>";
    echo "<tr><td> จำนวนวันที่ยืมได้ : </td><td>".$data["dayAmount"]."</td></tr>";
    echo "<tr><td> วันที่จัดเก็บหนังสือ : </td><td>".$data["bookDate"]."</td></tr></table>";?>
    <BR>
    <div align="center">
        <A HREF="listofbook.php">กลับหน้าหลัก</A>
    </div>
    <BR>
</BODY>

</HTML>