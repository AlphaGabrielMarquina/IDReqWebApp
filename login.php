<?php
include 'connect.php';
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM useraccount WHERE user_username='$username' AND user_password='$password'";
    $result=mysqli_query($con,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: registration.php");
    }elseif ($username=="admin"&&$password=="admin"){
      header("Location: approval.php");
    }
    else{
      echo"Incorrect Username or Password";
        exit();
    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Log in</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <link rel="stylesheet" href="Login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>



  <div class="menu-bar">
    <nav class="navbar navbar-expand-lg navbar-light stic">
        <a class="navbar-brand" href="#"><img class="img-fluid" src="tupc logo.png"></a>
        <a class="navbar-brand custom-brand desktopp" href="#" style="text-align: left;">TUP CAVITE</a>
        <button style="opacity: 0; cursor: default" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


      
    </nav>
  </div>

  <div class="container-fluid">
    <div class="row p-0 p-sm-1 p-md-2 p-lg-4">
      <div class="col-sm-3 mt-4">
      </div>
      <div class="col-sm-6 dc">
        <form method="POST">
          <div class="form-floating mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="TUPC-XX-XXXX"  name="username" id="username"required>
            
          </div>
          <div class="form-floating">
            <label for="password">Password</label>
            <input type="password" class="mb-3 form-control" name="password" id="password" placeholder="Password" required>
            
          </div>
          <div class="form-floating">
            <button type="submit" name="submit" class="btn btn-primary btn-block" class="mb-3 form-control" onclick="login()">LOG IN</button>
          </div>
          <div class="form-floating text-center">
            <a href="changepass.php" style="color:gray;">Forgot Password</a>
          </div>
        </form>
      </div>
      <div class="col-sm-3">

      
      </div>
    </div>
    </div>
  </div>
</body>
<!--<script src="{% static 'js/Login.js'%}"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>