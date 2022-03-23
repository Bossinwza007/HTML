<center><h2>Fibonacci Number</h2><br>
<form method="GET">
<label>Input</label>
<input type="text" name ="num">
<button type="submit">Submit</button>
</form>
<?php 
echo "<h1>Result</h1><br>";
    if(isset($_GET['num'])){ 
        $n1 = $_GET['num'];
        $res = calnaja($n1);
        echo "<h2>".$res."</h2>";
    }

function calnaja($n1){
    $num = array(0,1);
    for($i=2;$i<$n1;$i++){
        array_push($num,$num[$i-1]+$num[$i-2]);
    }
    return $res = implode(" ",$num); ;
}
?> 