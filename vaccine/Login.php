<?php 

require_once "conn/conn.php";

if(isset($_POST['submit'])){
  echo "<h4>Wait...</h4>";

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM v_user WHERE v_email = '$email' AND v_password = '$password'";
  $query = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($query);

  if($result){
    session_start();
    $_SESSION['id'] = $result['v_id'];
    $_SESSION['fname'] = $result['v_fname'];
    $_SESSION['lname'] = $result['v_lname']; 
    $_SESSION['email'] = $result['v_email'];
    $_SESSION['password'] = $result['v_password'];
    $_SESSION['sex'] = $result['v_sex'];
    $_SESSION['phone'] = $result['v_phone'];
    $_SESSION['age'] = $result['v_age'];
    $_SESSION['status'] = $result['v_status'];
    $iduser = $result['v_id'];
    $sql = "SELECT v_vaccine.v_id,v_vaccine.v_name,v_vaccine.v_effect,v_data.date1,v_data.date2 FROM v_data INNER JOIN v_vaccine ON v_data.v_idvaccine = v_vaccine.v_id WHERE v_iduser = '$iduser'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    if($result){
        $_SESSION['idvaccine'] = $result['v_id'];
        $_SESSION['statusdelectvaccine'] = true;
        $_SESSION['vaccine'] = $result['v_name'];
        $_SESSION['effect'] = $result['v_effect'];
        $_SESSION['date1'] = $result['date1'];
        $_SESSION['date2'] = $result['date2'];
    }else{
        $_SESSION['statusdelectvaccine'] = false;
    }
    if($_SESSION['status'] == 'admin'){
        echo "<h4>Admin!!!!</h4>";
        header('refresh:1;url=../vaccine/index.php?page=admin');
    }else{
    header('refresh:1;url=../vaccine/index.php?page=vaccine');
    }
  }else{
    echo "<h4>Account is not found!</h4>";
    header('refresh:2;url=../vaccine/index.php?page=Login');
  }
}else{

?>

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="image/banner.jpg" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem;height:506px;">
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="Login.php" method="POST">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Login</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                    </h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            placeholder="Email!">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            placeholder="Password!">
                                        <label class="form-label" for="form2Example27">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <input type="submit" class="btn btn-dark btn-lg btn-block" name="submit"
                                            value="Login">
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>