<?php
$conn = mysqli_connect('localhost','root','','btl_ql','3306');
                    
if(!$conn){
die("kết nối thất bại. Kiểm tra lại");
}

$id = $_POST['id'];
$sqlDelete = "DELETE from plan WHERE plan_id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>