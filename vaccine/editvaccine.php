<?php 
    require_once "conn/conn.php";
    $delect = $_SESSION['idedit'];
    $sql = "SELECT * FROM v_vaccine WHERE v_id ='$delect'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
     
    if(isset($_POST['submit'])){
        $id = $_SESSION['idedit'];
        $vname = $_POST['vname'];
        $veffect = $_POST['veffect'];
        $vminage = $_POST['vminage'];
        $vamount = $_POST['vamount'];
        $vdetail = $_POST['vdetail'];
        $vseffects = $_POST['vseffects'];
        $vproducer = $_POST['vproducer'];
        $sql = "UPDATE `v_vaccine` SET `v_name`='$vname',`v_effect`='$veffect',`v_minage`='$vminage',`v_amount`='$vamount',`v_detail`='$vdetail',`v_seffects`='$vseffects',`v_producer`='$vproducer' WHERE v_id = '$id'";
        $query = mysqli_query($conn,$sql);
        session_start();
        unset($_SESSION['idedit']);
        echo "<h4>Update Success!</h4>";
        header('Location: ../vaccine/index.php?page=tablevaccine');
    
    }else{

?>
<section style="background-color: #eee;min-height: 582px;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                    <form action="index.php?page=editvaccine" method="post">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine name</p>
                            </div>
                            
                            <div class="col-sm-9">
                                <input type="text" class="text-muted mb-0" name="vname" value="<?= $result["v_name"]?>" style="width:300px;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine effect</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="text-muted mb-0" name="veffect" value="<?= $result["v_effect"]?>" style="width:100px;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine minage</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="text-muted mb-0" name="vminage" value="<?= $result["v_minage"]?>" style="width:100px;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine amount</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="number" class="text-muted mb-0" name="vamount" value="<?= $result["v_amount"]?>" style="width:100px;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine detail</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="text-muted mb-0" name="vdetail" value="<?= $result["v_detail"]?>" style="width:500px;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine seffect</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="text-muted mb-0" name="vseffects" value="<?= $result["v_seffects"]?>" style="width:100%;" require>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Vaccine producer</p>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="text-muted mb-0" name="vproducer" value="<?= $result["v_producer"]?>" style="width:200px;" require>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <center>
                <input type="submit" class="btn btn-outline-danger" name="submit" value="Edit" style="width:500px;height:80px;">
</center>
</form>
            </div>
        </div>
    </div>
</section>
<?php } ?>