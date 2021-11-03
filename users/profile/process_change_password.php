<?php
    if(isset($_POST['btn_save']))
        $id    =$_POST['users_id'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $pass3 = $_POST['pass3'];
        $conn = mysqli_connect('localhost','root','','btl_ql','3306');                  
            if(!$conn){
            die("kết nối thất bại. Kiểm tra lại");
            }
            $sql_1   =   "SELECT * FROM infor_users a, users b where a.userid=b.userid and user_level='0' and infor_id='$id'";
            $result  =  mysqli_query($conn,$sql_1);
            if(mysqli_num_rows($result)>0)
                $row = mysqli_fetch_assoc($result);
                $pass_saved = $row['password'];
                if(password_verify($pass1,$pass_saved)){
                    if($pass2==$pass3){
                        $pass_hash = password_hash($pass2,PASSWORD_DEFAULT);
                        $sql_2 = "UPDATE `users` SET `password`='$pass_hash' WHERE user_level='0'";
                        $result2  =  mysqli_query($conn,$sql_2);
                        if($result2==true){
                            $values = "success";
                            header("Location: change_password.php?response=$values&id=$id");
                        }

                    }else{
                        $values = "fail2";
                        header("Location: change_password.php?response=$values&id=$id");
                    }
                    }

                else{
                    $values = "fail1";
                    header("Location: change_password.php?response=$values&id=$id");
                }                       
?>