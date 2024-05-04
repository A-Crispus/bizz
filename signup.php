<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST["register"])) {
        include 'config.php';

        $fullname = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
      

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM registeredusers WHERE email='{$email}'")) > 0) {
            echo "<script>alert('{$email} - email has already taken.');</script>";
        }
        
        else {
            if ($password === $cpassword) {
                $sql = "INSERT INTO registeredusers (fullname,email,userpassword) VALUES ('{$fullname}', '{$email}','{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {

                     //echo success then redirect

                     echo "<script>alert('Success account created.');</script>";

                    //if result is successfull navigate to dashboard page
                    header("Location: dashboard.php");

                }else {
                    echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
                }
            }else {
                echo "<script>alert('Password and confirm password do not match.');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>webwing</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/register.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <?php include 'header.php';?>
      <!-- end header inner -->
      <!-- end header -->
 
      <!-- contact  section -->
      <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form class="" action="" method="post" autocomplete="off">

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg"><b>Your Name:<b></label>
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" placeholder="Enter fullname"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg"><b>Your Email:<b></label>
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Enter email"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg"><b>Password:<b></label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg"  placeholder="Enter password"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cdg"><b>Repeat your password:<b></label>
                  <input type="password" name="cpassword" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Confirm password"/>
                  
                </div>

                <div class="form-check d-flex justify-content-right mb-5">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                <label class="form-check-label" for="form2Example3g">
                 <P> I agree all statements in <a href="#!" class="text-body"> <u>Terms of service</u></a></P> 
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      <!-- end contact  section -->
      <!--  footer -->
      <?php include 'footer.php';?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
