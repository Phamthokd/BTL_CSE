<?php
    session_start();
    if(!isset($_SESSION['login_ok']))
        header("Location: http://localhost:88/BTL_CSE/login/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>đây là trang admin</h2>
    <?php
       echo "<a href='layout.php'><button class='btn btn-success' type='submit'>Đăng xuất</button></a>";
    ?>
</body>
</html>