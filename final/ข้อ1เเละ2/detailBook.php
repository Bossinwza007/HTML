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
    echo "<table border=1 align=center bgcolor=#FFCCCC>";
    echo "<tr><td align=center colspan = 2bgcolor =#FF99CC><B>แสดงรายละเอียดหนังสือ</B></td></tr>";
    echo "<tr><td> รหัสหนังสือ : </td><td>".$data["bookId"]."</td></tr>";
    echo "<tr><td> ชื่อหนังสือ  : </td><td>".$data["bookName"]."</td></tr>";
    echo "<tr><td> ประเภทหนังสือ  : </td><td>".$data["typeId"]."</td></tr>";
    echo "<tr><td> สถานะหนังสือ   : </td><td>".$data["statusId"]."</td></tr>";
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