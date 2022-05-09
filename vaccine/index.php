<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaccine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <?php
    require_once "components/nav.php";

    if(!isset($_SESSION['id'])){

    if(isset($_GET['page'])){   
        $page = $_GET['page'];
    }else{
        $page = 'Login';
    }
    include_once ($page.'.php');


    }
    else{

    if(isset($_GET['page'])){   
        $page = $_GET['page'];
    }else{
        $page = 'vaccine';
    }
    include_once ($page.'.php');

    

    }
    require_once "components/footer.html";
?>

</body>

</html>