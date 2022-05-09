<?php
  

  if(!isset($_SESSION['id'])){
    ?>

<nav class="navbar fixed-top navbar-light bg-light height80">
    <div class="container-fluid" style="display:block">
        <a class="navbar-brand" href="index.php?page=Login">Vaccine</a>
        <a class="navbar-brand font20" href="index.php?page=Login">Login</a>
        <a class="navbar-brand font20" href="index.php?page=Register">Register</a>
    </div>
</nav>


<?php }else if($_SESSION['status'] == "admin"){ ?>

<nav class="navbar fixed-top navbar-light bg-light height80">
    <div class="container-fluid" style="display:block">
        <a class="navbar-brand" href="index.php?page=admin">Vaccine</a>
        <a class="navbar-brand font20" href="index.php?page=status"><?= $_SESSION['fname']?></a>
        <a class="navbar-brand font20">Status : <?= $_SESSION['status']?></a>
        <a class="navbar-brand font20" href="index.php?page=tableuser">Tableuser</a>
        <a class="navbar-brand font20" href="index.php?page=tablevaccine">Tablevaccine</a>
        <a class="navbar-brand font20" href="logout.php">Logout</a>
    </div>
</nav>

<?php }else{ ?>

<nav class="navbar fixed-top navbar-light bg-light height80">
    <div class="container-fluid" style="display:block">
        <a class="navbar-brand" href="index.php?page=vaccine">Vaccine</a>
        <a class="navbar-brand font20" href="index.php?page=status"><?= $_SESSION['fname']?></a>
        <a class="navbar-brand font20">อายุของเธอไง : <?= $_SESSION['age']?></a>
        <a class="navbar-brand font20" href="logout.php">Logout</a>
    </div>
</nav>

<?php } ?>

<style>
.height80 {
    height: 80px;
    position: unset;
}

.font20 {
    font-size: 16px !important;
}
</style>