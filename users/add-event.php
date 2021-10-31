<?php
include("../config/db.php");

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sqlInsert = "INSERT INTO plan (title,date_start,date_end) VALUES ('".$title."','".$start."','".$end ."')";

$result = mysqli_query($conn, $sqlInsert);

if (!$result) {
    $result = mysqli_error($conn);
}
else {
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
}
?>