<?php   
    session_start();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //thực hiện truy vấn
    //B1: kết nối
    include('../config/db.php');
    //b2: truy vấn
    //kiểm tra đã có email đk hợp lệ chưa
    $sql_1   =   "SELECT * FROM users where email='$email'";
    $result  =  mysqli_query($conn,$sql_1);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $pass_saved = $row['password'];
        if(password_verify($pass,$pass_saved) and $row['status']==1 and $row['user_level']==0 )//kiểm tra mk nhập và mk trên hệ thống có trùng ko và thêm đk là status phaiar bằng 1
        {
            $_SESSION['login_ok']=$email;
            header('Location: http://localhost:88/BTL_CSE/users/');
            }
        elseif(password_verify($pass,$pass_saved) and $row['status']==1 and $row['user_level']==1 )//kiểm tra mk nhập và mk trên hệ thống có trùng ko và thêm đk là status phaiar bằng 1
        {
            $_SESSION['login_ok']=$email;
            header('Location: http://localhost:88/BTL_CSE/admin/');
            }
        else{
            $values = "false1";
            header("Location:login.php?response=$values");
            }
}
    else
    {
        
        $values = "false1";
        header("Location:login.php?response=$values");
    }

?>