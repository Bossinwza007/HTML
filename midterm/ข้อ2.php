<?php
function CheckarmStrong($num){
    $value = $num; 
    $count = 0; 
    while($num >= 1){
        $digit[$count] = $num%10;
        $num /= 10;
        $count++; 
    }
    $total = 0;
    for($i = 0 ; $i < $count ; $i++){
        $data=1;
        for($j = 0 ; $j < $count ; $j++){
            $data=$data * $digit[$i]; 
        }
        $total += $data;
    }
    if($total == $value){ 
        return ' is amstrong number';
    }
    else{
        return ' not a amstrong number';
    }
}
function Showbody(){
echo "<center><form method=\"GET\">
        <table border=\"0\">
        <tbody>
            <tr>
            <td>Input :</td><br>
            <td><input type=\"text\" name=\"num\"></td>
            </tr><br>
            <tr>
            <td><br><br><input name=\"submit\" type=\"submit\" value=\"Click\"></td>
            </tr>
        </tbody>
        </table>";
if(isset($_GET['submit']))
{
    $num = $_GET['num'];
    $str = CheckarmStrong($num);
    echo "<br><h2>". $num . " " . $str . "</h2>";
}
}
showbody();
?>