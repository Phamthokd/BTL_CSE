<?php
include('../config/db.php');

$id = $_POST['id'];
$sqlDelete = "DELETE from plan WHERE plan_id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>