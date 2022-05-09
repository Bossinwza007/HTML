<html>
<body>
<form method="GET" action="vowels.php">
Enter the String : <input type="text" name="inputStr"><br>
<input type="submit" name="Submit">
</form>
</body>
</html>

<?php

if(isset($_GET['inputStr'])){
    $string = $_GET['inputStr'];

    $vowels = array("a"=>0,"e"=>0,"i"=>0,"o"=>0,"u"=>0);
    $cnt = 0;
    for($i=0; $i<strlen($string); $i++) {
        if(strtolower($string[$i]) == 'a') {
        ++$cnt;
        ++$vowels['a'];
    }
    if(strtolower($string[$i]) == 'e') {
        ++$cnt;
        ++$vowels['e'];
    }
    if(strtolower($string[$i]) == 'i') {
        ++$cnt;
        ++$vowels['i'];
    }
    if(strtolower($string[$i]) == 'o') {
        ++$cnt;
        ++$vowels['o'];
    }
    if(strtolower($string[$i]) == 'u') {
        ++$cnt;
        ++$vowels['u'];
    }
    }

    echo "<h4> Output : English vowels consist of:".$cnt."<h4>";
    echo "A : ".$vowels['a']."<br>";
    echo "E : ".$vowels['e']."<br>";
    echo "I : ".$vowels['i']."<br>";
    echo "O : ".$vowels['o']."<br>";
    echo "U : ".$vowels['u']."<br><br>";
    echo "Input :".$string;
    $str=strrev($string);
    $a=strlen($string);
    $f=0;
    for($j=0;$j<$a;$j++)
    {
        if($str[$j]==$string[$j])
        {
            $f=0;
        }
        else
        {
            $f=1;
            break;
        }
    }   
}
?>

