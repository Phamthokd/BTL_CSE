<?php
include("../config/db.php");

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$email = $_POST['email'];
$sql = "SELECT * FROM `users` a, infor_users b WHERE a.userid=b.userid AND email = '$email'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['infor_id'];
}

$sqlInsert = "INSERT INTO plan (title,date_start,date_end,infor_id) VALUES ('".$title."','".$start."','".$end ."','".$ID ."')";

$result = mysqli_query($conn, $sqlInsert);

if (!$result) {
    $result = mysqli_error($conn);
}
else {
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
}
}
