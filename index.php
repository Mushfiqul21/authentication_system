<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    

 <form class="container p-3 w-25 border border-primary-subtle rounded-3 mt-5" method="POST">
    <h3 class="text-center bg-primary-subtle py-3 rounded-3 mb-3">
        Adventure Begins from here!!
    </h3>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="name" class="form-control border border-primary-subtle rounded-3" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control border border-primary-subtle rounded-3" id="exampleInputPassword1">
  </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        <a href="registration.php">Create account</a>
 </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>



<?php
    session_start();
    $con = mysqli_connect('localhost','root','','form_validation');
    if(isset($_POST['submit']))
    {
        $username = $_POST['name'];
        $password = $_POST['pass'];


        if(empty($username))
        {
            echo "<h2 class='bg-danger py-3 text-center'>username is empty</h2>";
            exit();
        }
        else if(empty($password))
        {
           echo "<h2 class='bg-danger py-3 text-center'>password is empty</h2>";
            exit();
        }
        else
        {
           $sql = "SELECT * FROM info WHERE name = '$username' AND password = '$password'";
           $result = mysqli_query($con, $sql);

           if($result->num_rows > 0)
           {
            $_SESSION['login'] = 'Welcome to Dashboard';
            $_SESSION['username'] = $username;
            header('location:dashboard.php');
           }
           else{
            echo "<h2 class='text-danger py-3 text-center'>Wrong Username Or Password</h2>";
           }
        }
    }

?>