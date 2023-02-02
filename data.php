<?php

$conn = mysqli_connect("localhost","root","","task_manager");
if(!$conn){
    die ('could not connect by sql' .mysql_error());
}

?>