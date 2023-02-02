<?php
include_once 'data.php';

?>
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];



    $query = "select * from `login` where `id` = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        
        $row = mysqli_fetch_assoc($result);
       
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>manage companies</title>
</head>
<style>
    nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 40px;
    padding-left: 10%;
    padding-right: 10%s;
}
.logo{
    color: white;
    font-size: 20px;
}
span{
    color: RED;
}
nav ul li{
    list-style-type: none;
    display: inline-block;
    padding: 10px 20px;
}
nav ul li a{
    color: white;
    text-decoration: none;
    font-weight: bold;
}
nav ul li a:hover{
    color: #ea1538;
    transition: .3s ;

}
button{
   border: none; 
   background: #ea1538;
   padding: 10px 25px;
   border-radius: 30px;
   color: white;
   font-size: 15px;
   transition: .4s;
}
button:hover{
    transform: scale(1.3);
    cursor: pointer;
}
</style>
<body style="color: white; background-color:#172b4d !important">
    <div class="hero">
        <nav>
            <h2 class="logo"> CT<span>MS</span></h2>
            <ul>
                <li><a href="index3.php">home</a></li>
                <li><a href="indexC.php">manage companies</a></li>
                <li><a href="adminestration.php">adminestration</a></li>
                
            </ul>
            <button type="button"><a href="logout.php"  style="color: white;"> Logout</a></button>
        </nav>
    </div>
    <div class="container mt-5">
       <div class="text-center">
        <h1 class="display-5 mb-5"> <strong>UPDATE USER</strong></h1>

       </div>

<?php
if (isset ($_POST['ubdate_User'])){

    if (isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    $username = $_POST['name'];
    $password = $_POST['password'];

    $query = "update `login` set `username` = '$username',`password` = '$password' where `id` = $idnew";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("query failed".mysqli_error());
    }

    else{
        header('location:test.php');
    }
}



?>

<form   action ="editUser.php?id_new=<?php echo $id;?>" method="post">
<div class="col-8  mb-3">
<label for="name">username</label>
<input class="form-control" id="id" name="name"  type="text" placeholder="id " value="<?php echo $row['username']?>">
</div>
<div class="col-8  mb-3">
<label for="name">password</label>
<input class="form-control" id="email"  name="password" type="password" placeholder="passwpord" value="<?php echo $row['password']?>">
</div>
<input class="btn btn-success add-btn" type="submit" name="ubdate_User" value="ubdate">
<button type="button"><a href="test.php"  style="color: white;">cancel</a></button>
</form>
