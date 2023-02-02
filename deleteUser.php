<?php
include_once 'data.php';
$sql = "DELETE FROM login WHERE id ='" .$_GET["id"] ."'";
if (mysqli_query($conn,$sql)) {
    header("location:test.php");
}else {
    echo "error deleting record" .mysqli_error($conn);
}
mysqli_close($conn);
?>