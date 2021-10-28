<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $userid = $_POST['userid'];
    $group = $_POST['group'];
    //B1: kết nối
    include('../config/db.php');
    //B2 truy cập
    $sql = "INSERT INTO infor_users (first_name,last_name,age,address,date,phone_number,gender,group_id,userid) VALUES ('$first_name','$last_name','$age','$address','$date','$phone_number','$gender','$group','$userid')";
    $result = mysqli_query($conn,$sql);
    if($result==true){
        header('Location:activation.php?accout='.$userid.'');
    }
?>