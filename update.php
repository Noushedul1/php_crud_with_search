<?php
require "./database.php";
require "./function.php";

$sname = mysqli_prep($_POST['sname']);
$age = mysqli_prep($_POST['age']);
$city = mysqli_prep($_POST['city']);
$userId = mysqli_prep($_POST['userId']);

$update_sql = "UPDATE studentdetails SET sname ='$sname',age = '$age', city = '$city' WHERE id = $userId";
$result = mysqli_query($connection,$update_sql);
if($result) {
    echo "data successfully updated";
}else{
    echo "data not updated";
}
?>