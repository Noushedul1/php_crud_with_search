<?php
require "./database.php";
require "./function.php";
$deleteId = mysqli_prep($_POST['userId']);
$delete_sql = "DELETE FROM studentdetails WHERE id = $deleteId";
$result = mysqli_query($connection,$delete_sql);
?>