<?php
  if(isset($_POST['btnSave'])){
    $MaCV       = $_POST['txtMaCV'];
    $tenCV      = $_POST['txtTenCV'];
    $NDCV       = $_POST['txtNDCV'];
    $Ngaybd     = $_POST['txtNgaybd'];
    $Ngaykt     = $_POST['txtNgaykt'];
    $ifid       = $_POST['txtifid'];

    $conn = mysqli_connect('localhost','root','','btl_ql');
            if(!$conn){
                die("Không thể kết nối,kiểm tra lại các tham số kết nối");
        }

    $sql = "INSERT INTO plan(plan_id, title, content, date_start, date_end, infor_id)
    VALUES('$MaCV','$tenCV','$NDCV','$Ngaybd','$Ngaykt','$ifid')";

    echo $sql."<br>";

    if(mysqli_query($conn,$sql)==TRUE){
      $value='successfully';
      header("Location:index.php?response=$value");
    }else{
      $value='existed';
      header("Location:index.php?response=$value");
    }
    mysqli_close($conn);
  }
?>