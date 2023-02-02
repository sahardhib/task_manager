<?php
include_once 'data.php';
$result = mysqli_query($conn,"SELECT * FROM login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <title>tableaux user</title>
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
table {
    border-collapse:collapse;
}
th,td{
border:1px solid black;
padding:10px;
}

</style>
<body    style="color: white; background-color:#172b4d !important">
    <div class="hero">
        <nav>
            <h2 class="logo"> CT<span>MS</span></h2>
            <ul>
                <li><a href="index3.php">home</a></li>
                <li><a href="indexC.php">manage companies</a></li>
                <li><a href="adminestration.php">adminestration</a></li>
                
            </ul>
            <button type="button"><a href="logout.php"> Logout</a></button>
        </nav>
    </div>
    
    <div class="col-8 mt-3">
            <table class="table table-strped table-dark">

             
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>action</th>

                    </tr>

                <?php 
                
                if ($conn->connect_error){
                    die("Connection failed:".$conn->connect);
                }
                $sql = "SELECT id , username,password from login";
                $result = $conn-> query($sql); 
                if ($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>" .$row["id"] . "</td><td>" .$row["password"] ."</td><td>" .$row["username"] ."</td>
                        <td><a href='deleteUser.php?id=".$row['id']."'class='btn btn-danger'>delete</a>
                        <a href='editUser.php?id=".$row['id']."'class='btn btn-success'>dit</a></td></tr>";
                       

                    }
                    echo "</table>";
                }
                else {
                    echo "0 result";

                }
                $conn-> close();
                ?>

                </table> 
               
                
                
            </table> 
</body>
</html>