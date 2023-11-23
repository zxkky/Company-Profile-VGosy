
<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 
 require 'vendor/autoload.php';
 $mail = new PHPMailer();

 try {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];

     $mail->SMTPDebug = 0;
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';

     $mail->Username = 'kito008700@gmail.com';
     $mail->Password = 'bwcm cvsm epwv crpf';

     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;

     $mail->setFrom('kito008700@gmail.com', 'VGosy ');
     $mail->addAddress('kito008700@gmail.com');

     $mail->isHTML(true);
     $mail->Subject = 'PERUSAHAAN';
     $mail->Body = "<div style='background-color: #ffff; 
     border: 1px solid #2980b9; 
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
     border-radius: 5px; 
     max-width: 600px; 
     margin: 0 auto; 
     padding: 20px;'>

<h1 style='font-family: Arial, sans-serif; text-align: center; color: #2c3e50; margin: 0; padding: 0;'>$nama</h1>
<p style='font-family: Arial, sans-serif; font-size: 16px; color: #000; text-align: left; margin: 10px 0;'>$email</p>
<p style='font-family: Arial, sans-serif; color: #000; text-align: left; margin: 10px 0;'>$pesan</p>
</div>
";
     $mail->send();
     header("Location: /Company_Profile/Company.html");
     echo 'Email has been sent successfully.';
 }  catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
?>
