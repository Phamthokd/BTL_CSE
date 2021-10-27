<?php
    include('../config/db.php');
    if (isset($_GET['accout'])) {
        $email = $_GET['accout'];
        $sql = "SELECT * from users where email = '$email'";
        $res = mysqli_query($conn, $sql);
        $user = mysqli_num_rows($res);
        if ($user > 0) {
            $sql = "UPDATE users set status = 1 where email = '$email'";
            $res = mysqli_query($conn, $sql);
            header("Location: http://localhost:88/BTL_CSE/login/login.php?status=1");
        } 
        
    } else {
        echo 'Lỗi';
    }

?>