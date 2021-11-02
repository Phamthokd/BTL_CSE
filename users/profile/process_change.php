<?php
        if(isset($_POST['btn_change'])){
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            $newpass = md5($_POST['newpass']);

            $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                if(!$conn){
                    die("kết nối thất bại. Kiểm tra lại");
                    }
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
            $row = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($row);
            if($count>0){
                $sql_update= "UPDATE users SET password='$newpass'";
                echo 'mật khẩu được thay đổi';
            }
            else{
                echo 'tài khoản hoặc mật khẩu không chính xác';
            }
        }
?>