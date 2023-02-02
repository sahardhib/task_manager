<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $address = $row["address"];
                $email = $row["email"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
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
</head>
<body     style="color: black; background-color:#172b4d !important">
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <p><a href="indexC.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>