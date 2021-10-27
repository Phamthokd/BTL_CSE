<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'sendEmailv1/Exception.php';
    require 'sendEmailv1/PHPMailer.php';
    require 'sendEmailv1/SMTP.php';

    if(isset($_POST['checkbox'])){
        if(isset($_POST['btn_account'])){
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            //B1: kết nối
            include('../config/db.php');
            //B2 truy cập
                $sql_1 = "SELECT * FROM users WHERE email = '$email'";
                $result_1 = mysqli_query($conn,$sql_1);
                //email đã tồn tại
                if(mysqli_num_rows($result_1)>0){
                    $values = "existed";
                    header("location:create_account.php?response=$values");
                    }
                else{
                    //email chưa tồn tại
                    $std=rand();
                    $code=md5($std);
                    $pass_hash = password_hash($pass1,PASSWORD_DEFAULT);
                    $sql_2 = "INSERT INTO users (email, password, code) VALUES ('$email','$pass_hash','$code')";
                    $result_2 = mysqli_query($conn,$sql_2);

                    $mail = new PHPMailer(true);

                    try {
                    //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
                        $mail->isSMTP();// gửi mail SMTP
                        $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                        $mail->SMTPAuth = true;// Enable SMTP authentication
                        $mail->Username = 'phamthokd@gmail.com';// SMTP username
                        $mail->Password = 'Nghia12345'; // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                        $mail->Port = 587; // TCP port to connect to
                        $mail->CharSet = 'UTF-8';
                        //Recipients
                        $mail->setFrom('phamthokd@gmail.com', 'Kích hoạt tài khoản');
                    
                        $mail->addReplyTo('phamthokd@gmail.com', 'Kích hoạt tài khoản');
                        
                        $mail->addAddress($email); // địa chỉ người nhận
                        
                        // Attachments
                        // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
                        //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name
                    
                        // Content
                        $mail->isHTML(true);   // Set email format to HTML
                        $tieude = '[Đăng kí tài khoản] kích hoạt tài khoản người sử dụng';
                        $mail->Subject = $tieude;
                        
                        // Mail body content 
                        $bodyContent = '<p>Chào mừng bạn</b></h1>'; 
                        $bodyContent .= '<p>bạn vui lòng nhấp vào đây để kích hoạt tk</p>';
                        $bodyContent .= '<p><a href="http://localhost:88/BTL_CSE/register/create_infor.php?accout='.$email.'&code='.$code.'">click</a></p>';
                        
                        $mail->Body = $bodyContent;
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        if($mail->send()){
                            echo 'Thư đã được gửi đi';
                        }else{
                            echo 'Lỗi. Thư chưa gửi được';
                        }  
                
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    if($result_2 > 0){
                        $values = "success";
                        header("Location:create_account.php?response=$values");
                     }
                            
                }
                
        }
    }
    else{
    $values1 = "error";
    header("location:create_account.php?response=$values1");}
?>