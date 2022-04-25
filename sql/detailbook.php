<HTML>

</HTML>
<HEAD>
    <TITLE>Show Data Book</TITLE>
</HEAD>

<BODY>
    <?php
    $id = $_GET['id'];
    $hostname = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "itbook"; 
    $conn = mysqli_connect( $hostname, $username, $password,$dbname ); 
    if ( ! $conn ) 
    die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_set_charset( $conn,"Utf-8");
    $result = mysqli_query($conn,"SELECT * from book where BookID = $id") or die(mysqli_error($conn));
    $data = mysqli_fetch_array($result);
    $image = "<img src=\"Picture/".$data["Picture"]."\" align =\"center\" width=\"80\" height =\"100\">";
    echo "<table border=1 align=center bgcolor=#FFCCCC>";
    echo "<tr><td align=center colspan = 2bgcolor =#FF99CC><B>แสดงรายละเอียดหนังสือ</B></td></tr>";
    echo "<tr><td> รหัสหนังสือ : </td><td>".$data["BookID"]."</td></tr>";
    echo "<tr><td> ชื่อหนังสือ  : </td><td>".$data["BookName"]."</td></tr>";
    echo "<tr><td> ประเภทหนังสือ  : </td><td>".$data["TypeID"]."</td></tr>";
    echo "<tr><td> สถานะหนังสือ   : </td><td>".$data["StatusID"]."</td></tr>";
    echo "<tr><td> สำนักพิมพ์  : </td><td>".$data["Publice"]."</td></tr>";
    echo "<tr><td> ราคาซื้อ  : </td><td>".$data["UnitPrice"]."</td></tr>";
    echo "<tr><td> ราคาเช่า  : </td><td>".$data["UnitRant"]."</td></tr>";
    echo "<tr><td> รูปภาพ  : </td><td>".$image."</td></tr>";
    echo "<tr><td> จำนวนวันที่ยืมได้ : </td><td>".$data["DayAmount"]."</td></tr>";
    echo "<tr><td> วันที่จัดเก็บหนังสือ : </td><td>".$data["BookData"]."</td></tr></table>";?>
    <BR>
    <div align="center">
        <A HREF="listofbook.php">กลับหน้าหลัก</A>
    </div>
    <BR>
</BODY>

</HTML>