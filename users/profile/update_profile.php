<?php
        if (isset($_POST['btn_save'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $date = $_POST['date'];
            $phone_number = $_POST['phone_number'];
            $gender = $_POST['gender'];
            $update = mysqli_query($conn, "update infor_users set first_name = '$first_name', last_name='$last_name', 
             age='$age',address = '$address',date = '$date',
             phone_number = '$phone_number',gender = '$gender' where  = '$'");
            if ($update == TRUE) {
                header('location:index.php');
            } else {    
                header('location:error.php');
            }
        }

        ?>