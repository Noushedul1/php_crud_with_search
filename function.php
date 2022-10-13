<?php
function mysqli_prep($str) {
    global $connection;
    $result = mysqli_real_escape_string($connection,$str);
    return $result;
}
?>