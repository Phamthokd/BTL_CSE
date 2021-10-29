<?php
include('../config/db.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

$sqlUpdate = "UPDATE plan SET title='" . $title . "',date_start='" . $start . "',date_end='" . $end . "' WHERE plan_id=" . $id;
mysqli_query($conn, $sqlUpdate);
mysqli_close($conn);

?>