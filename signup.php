<?php
$user=0;
$success=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=="POST"){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  // $sql="insert into `registration`(username,password) values('$username','$password')";
  // $execute=mysqli_query($con,$sql);
  // if($execute){
  //   echo "DataBase Created Successfully";
  // }else{
  //   die(mysqli_error($con));
  // }
  $sql="select * from `registration` where `username`='$username'";
  $execute=mysqli_query($con,$sql);
  if($execute){
    $num=mysqli_num_rows($execute);
    if($num>0){
      // echo "Datbase Already Exist";
      $user=1;
    }else{
      if($password===$cpassword){
        $sql="insert into `registration`(username,password) values('$username','$password')";
        $execute=mysqli_query($con,$sql);
        if($execute){
          // echo "DataBase Created Successfully";
          $success=1;
        }else{
          die(mysqli_error($con));
        }
      }else{
        $invalid=1;
      }
     
    }
  }
}

?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up Forms</title>
  </head>
  <body>
  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry </strong>User Already Exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  
  ?>


<?php
if($success){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> User Added.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



?>

<?php
if($invalid){
  echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
  <strong>Sorry</strong> Check Your Passowrd.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



?>





    <h1 class="text-center mt-5">Sign Up Forms</h1>
    <div class="container mt-5">
    <form action="signup.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Here</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Name">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Confirm Password">
  </div>
 
 
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
    </div>

    
  </body>
</html>
