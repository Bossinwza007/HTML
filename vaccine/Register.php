<?php 

require_once "conn/conn.php";

if(isset($_POST['submit'])){
//$id = $_SESSION['id'] ?? '';
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  //$status = $_POST['status'] ?? null;

  if(!$fname || !$lname || !$email || !$age || !$sex || !$phone || !$password){
    echo "<h4>Create a new account have failed <a href=\"index.php?page=Register\"> Try Again </a></h4>";
  }/*else if($_SESSION['status'] == "admin"){
    $sql = "SELECT v_email FROM v_user WHERE v_email = '$email'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    if($result)
    {
        echo "<h4>Email is ซ่ำ <a href=\"index.php?page=Register\"> Try Again </a></h4>";
    }else{
        echo "<h4>Edit account have success</h4>";
        $sql = "UPDATE v_user SET v_fname='$fname',v_lname='$lname',v_email='$email',v_age='$age',v_sex='$sex',v_phone='$phone',v_password='$password',v_status='$status' WHERE v_id = '$id'";
        $query = mysqli_query($conn,$sql);
        header('refresh:2;url=../vaccine/index.php?page=admin');
    }
  }*/
  else{
    
        echo "<h4>Create a new account have success</h4>";
        $sql = "ALTER TABLE v_user auto_increment = 1";
        $query = mysqli_query($conn,$sql);
        $sql = "INSERT INTO v_user(v_fname,v_lname,v_email,v_age,v_sex,v_phone,v_password) VALUES ('$fname','$lname','$email','$age','$sex','$phone','$password')";
        $query = mysqli_query($conn,$sql);
  
        header('refresh:2;url=../vaccine/index.php?page=Login');
    
  }
} 
/*else if($_SESSION['id']){

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM v_user WHERE v_id = '$id'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
?>

<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form action="Register.php" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="fname"
                                            value="<?= $result['v_fname']?>">
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="lname"
                                            value="<?= $result['v_lname']?>">
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <input type="text" class="form-control form-control-lg" name="age"
                                            value="<?= $result['v_age']?>">
                                        <label for="text" class="form-label">Age</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Female" checked>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Male">
                                        <label class="form-check-label">Male</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            value="<?= $result['v_email']?>">
                                        <label class="form-label">Email</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="tel" class="form-control form-control-lg" name="phone"
                                            value="<?= $result['v_phone']?>">
                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            value="<?= $result['v_password']?>">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <?php if($_SESSION['status']=="admin"){?>
                                <div class="col-md-6 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="status"
                                            value="<?= $result['v_status']?>">
                                        <label class="form-label">Status</label>
                                    </div>
                                </div>
                                <?php }else {?>
                                <?php } ?>
                            </div>
                            <div class="mt-3 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
*/


 else{ ?>
<section class="vh-150 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form action="Register.php" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="fname">
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="lname">
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <input type="text" class="form-control form-control-lg" name="age">
                                        <label for="text" class="form-label">Age</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Female" checked>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Male">
                                        <label class="form-check-label">Male</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="email" class="form-control form-control-lg" name="email">
                                        <label class="form-label">Email</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="tel" class="form-control form-control-lg" name="phone">
                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 pb-2">

                                    <div class="form-outline">
                                        <input type="password" class="form-control form-control-lg" name="password">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php }?>
<style>
.gradient-custom {
    background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-arrow {
    top: 13px;
}
</style>