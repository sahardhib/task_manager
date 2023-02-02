<?php

$host ="localhost";
$user="root";
$password="";
$db="task_manager";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
  die("connection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $username=$_POST["username"];
  $password=$_POST["password"];


  $sql="select * from login where username='".$username."'AND password='".$password."' ";

  $result=mysqli_query($data,$sql);

  $row=mysqli_fetch_array($result);

  if($row ["usertype"]=="user")
  {
    header("location:homeemp.php");
  }
  elseif($row ["usertype"]=="admin")
  {
    header("location:index3.php");
  }
  else{
    echo"username or password incorrect";
  }
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container">
        <h2 class="text-white text-center mb-4">Welcome</h2>
        <div class="card col-lg-5 col-md-6 col-12 mx-auto px-4 py-5">
            <p class="text-center"><small> sign in with</small></p>
            <form action="#" method="POST" >
                <div class=" form-group d-flex px-3 mb-4 py-1">
                    <i class="fa-solid fa-user"></i>
                  <input type="text" name="username" outocomplet="off" required class="form-control"  aria-describedby="emailHelp" placeholder="username">
                  
                </div>
                <div class="form-group d-flex px-3 mb-4 py-1">
                    <i class="fa-solid fa-key"></i>
                  <input type="password" name="password" outocomplet="off" class="form-control"  placeholder="password">
                </div>
                <div class="text-center pt-4">
                <button type="submit" class="btn btn-primary col-4">  Submit </button>
                </div>
              </form>
        </div>
    </div>
</body>
</html>