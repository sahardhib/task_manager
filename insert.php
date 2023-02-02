<?php
if(isset($_POST['submit'])) {
     $conn = new mysqli ("localhost","root","","task_manager");
     $name = $_POST['name'];
     $password = $_POST['password'];
     $sql = "INSERT INTO  login (username,password) VALUES ('$name','$password')";
     $result = $conn->query($sql);
     if ($result) {
        echo "send successfully";}
        else{
            echo "failled";
        }
}