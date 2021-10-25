<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    //B1: kết nối
    include('../config/db.php');
    //B2 truy cập
    $sql = "INSERT INTO infor_users (first_name,last_name,age,address,date,phone_number,gender,email) VALUES ('$first_name','$last_name','$age','$address','$date','$phone_number','$gender','$email')";
    $result = mysqli_query($conn,$sql);
    if($result==true){
        header('Location:activation.php?accout='.$email.'');
    }
        
    

?>