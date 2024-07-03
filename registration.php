<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    

 <form class="container p-3 w-25 border border-success-subtle rounded-3 mt-5" method="POST">
    <h3 class="text-center bg-success-subtle py-3 rounded-3 mb-3">
        Sign In
    </h3>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="name" class="form-control border border-primary-subtle rounded-3" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control border border-primary-subtle rounded-3" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control border border-primary-subtle rounded-3" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_pass" class="form-control border border-primary-subtle rounded-3" id="exampleInputPassword1">
  </div>
        <button type="submit" name="submit" class="btn btn-success w-100">Submit</button>
        <a href="index.php">Already have an account?</a>
 </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php

    $con = mysqli_connect('localhost','root','','form_validation');
    if(isset($_POST['submit']))
    {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $confirm_password = $_POST['confirm_pass'];


        if(empty($username))
        {
            header('location:registration.php');
            exit();
        }
        else if(empty($email))
        {
            header('location:registration.php');
            exit();
        }
        else if(empty($password))
        {
            header('location:registration.php');
            exit();
        }
        else if($password !== $confirm_password)
        {
            header('location:registration.php');
            exit();
        }
        else
        {
            $sql = "INSERT INTO info (name, email, password) VALUES ('$username','$email','$password')";

            if(mysqli_query($con, $sql))
            {
                header('location:index.php');
            }
            else{
                echo "Error occured";
            }
        }
    }

?>