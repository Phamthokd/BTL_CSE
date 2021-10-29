<?php
    $conn = mysqli_connect('localhost','root','','btl_ql');
    if(!$conn){
        die("Không thể kết nối,kiểm tra lại các tham số kết nối");
    }
    $id=$_GET['infor_id'];
    $sql = "DELETE FROM infor_users WHERE infor_id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $value='xoa';
        header("Location:index.php?response=$value");
    }else{
        echo 'xoa  tb';
    }
    mysqli_close($conn);

?>