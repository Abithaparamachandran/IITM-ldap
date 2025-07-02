<?php 
use PHPMailer\PHPMailer\PHPMailer;


include "dbconfig.php";

if (isset($_POST['sendmail'])) { 
    $uname=$_POST['username'];
    $passwd=$_POST['password'];
    $email=$_POST['mail'];
   /* $sql="INSERT INTO ldap(Username,Password) VALUES ('$uname','$passwd')";
    echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result==true){
	   
   }else{
	   
   }*/
    require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
 $mail->IsSMTP(); // send via SMTP
               // $mail->SMTPDebug = 1;
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = "tls";
               //$mail->SMTPSecure = "ssl";
                $mail->Port       = 587;
                $mail->Username='ccprj05@iitm.ac.in';
                $mail->Password='abi27%tha';
                $mail->Host     = "smtp.iitm.ac.in";
                $mail->Mailer   = "smtp";
                $mail->Subject  = 'IITM LDAP CREDENTIALS';
                $html = true;
                $mail->IsHTML($html);

		$message='<br>Dear user,<br></br>
		       <br>IITM LDAP CREDENTIALS <br></br> Username:'.$uname.'<br>Password:'.$passwd.'<br></br>
                       <br>You can access institute internet,moodle using your LDAP Credentials<br></br>
                       <br>Netaccess:<a href="https://netaccess.iitm.ac.in">https://netaccess.iitm.ac.in</a></br>
		      <br>Thanks&Regards<br>Eservices<br>';
        
        //echo"$message";
        $mail->Body = $message;
        $from="ccprj05@iitm.ac.in";
         $fromName = 'Eservices';
        $to ="$email";
        $mail->From = $from;
        $mail->FromName = $fromName;
        $addresses = explode(',', $to);
        foreach ($addresses as $to) {
                $mail->AddAddress($to);}
        //print_r($mail);
        if($mail->send())
        {
                echo '<div class="success">User Credentials will be mailed.</div>';
                echo "\n";

        }
	else{
		 echo"message not sent";

      }
    
 mysqli_close($con);

}
else {
 echo '<div>Error Occured .</div>';
}
?>
