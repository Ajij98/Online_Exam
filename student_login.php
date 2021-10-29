<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--STUDENT LOGIN PART-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
    $student_username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_student WHERE BINARY username = '$student_username' AND BINARY password = '$password' LIMIT 1";

    $result = $db->link->query($sql) or die($this->link->error.__LINE__);

    if($result->num_rows != 0)
    {
      $_SESSION['student_username'] = $student_username;
      header('location:Student_Panel/HTML/index.php');
    }
    else
    {
      $msg = '<div class="alert alert-danger alert-dismissable w-50 m-auto" id="flash-msg"><strong>Error ! </strong>Incorrect Username or Password !</div><br />';
    }
  }
  ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Login</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>

</head>

<body style="background-color: #A9CCE3;">


  <br><br><br><br><br>

  <div class="col-8 m-auto text-center">
    <?php echo $msg; ?>
  </div>

  <section id="Student_login_form" class="col-lg-6 col-md-6 m-auto">
    <div class="container">
      <div class="row">
        <div class="col">


          <div class="card col-lg-8 m-auto py-4">
            <div class="card-body">
              <h5 class="card-title mb-4 pb-4" style="margin-left: 130px;">
                <a href="index.html" class="logo d-flex align-items-center">
                  <img src="assets/img/graduation_cap - Copy.png" alt="">
                  <h5 style="color: #012970; margin-top: 20px;">ONLINE EXAM</h5>
                </a>
              </h5>

              <form class="col-lg-10 m-auto" action="" method="post" enctype="multipart/form-data" autocomplete="off">

                <div class="form-outline mb-4">
                  <i class="fas fa-user trailing"></i>
                  <input type="text" id="username" name="username" class="form-control form-icon-trailing" required/>
                  <label class="form-label" for="username">Username</label>
                </div>

                <div class="form-outline mb-4">
                  <i class="fas fa-key trailing"></i>
                  <input type="password" id="password" name="password" class="form-control form-icon-trailing" required/>
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="form1Example3"
                         required
                      />
                      <label class="form-check-label" for="form1Example3"> Remember me </label>
                    </div>
                  </div>

                  <div class="col">
                    <a href="#">Forgot password?</a>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block mb-3" name="submit" value="Sign in">

              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>





  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>

</body>

</html>
