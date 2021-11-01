<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'sendEmailv1/Exception.php';
    require 'sendEmailv1/PHPMailer.php';
    require 'sendEmailv1/SMTP.php';

        if(isset($_POST['btn_send'])){
            $content = $_POST['content'];

                    //B1: kết nối
            
                    $conn = mysqli_connect('localhost','root','','btl_ql','3306');
                                        
                    if(!$conn){
                    die("kết nối thất bại. Kiểm tra lại");
                    }

                    //B2 truy cập

                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $email = $row['email'];
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
                            $mail->setFrom('phamthokd@gmail.com', '');
                        
                            $mail->addReplyTo('phamthokd@gmail.com', '');
                            
                            $mail->addAddress($email); // địa chỉ người nhận
                            
                            // Attachments
                            // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
                            //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name
                        
                            // Content
                            $mail->isHTML(true);   // Set email format to HTML
                            $tieude = '[ADMIN] THÔNG BÁO';
                            $mail->Subject = $tieude;
                            
                            // Mail body content 
                            $bodyContent = $content; 
                            
                        
                            
                            
                            $mail->Body = $bodyContent;
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            if($mail->send()){
                                $values = "success";
                                header('location: send_notifi.php?response='.$values.'');
                            }else{
                                $values = "fail";
                                header('location: send_notifi.php?response='.$values.'');
                            }  
                    
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }       
                }
                
        
    }
?>