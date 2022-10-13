<?php
require "./database.php";
require "./function.php";

$sname = mysqli_prep($_POST['sname']);
$age = mysqli_prep($_POST['age']);
$city = mysqli_prep($_POST['city']);

$insert_sql = "INSERT INTO studentdetails(sname,age,city) VALUES('$sname','$age','$city')";
$result = mysqli_query($connection, $insert_sql);
if($result) {
    echo "data inserted";
}else{
    echo "data not inserted";
}
?>