<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
.success, .warning, .errormsgbox, .validation {
        border: 1px solid;
        margin: 0 auto;
        padding:10px 5px 10px 50px;
        background-repeat: no-repeat;
        background-position: 10px center;
        font-weight:bold;
     width:400px;

}
.success {
   	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
}


</style></head><body>
<?php
//echo"hai";
use PHPMailer\PHPMailer\PHPMailer;
ob_start();

$servername="localhost";
$username="root";
$password="Password1";
$dbname="llddaapp";
$con = @mysqli_connect($servernmae, $username, $password,$dbname);
if(!$con){
	echo"not connected";
}
//print_r($_POST);
if (isset($_POST['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
 $_POST['email'])) {
 $email = $_POST['email'];

//echo "$email";


 }
if (isset($_POST['key']) && (strlen($_POST['key']) == 32))
 //The Activation key will always be 32 since it is MD5 Hash
 {
 $key = $_POST['key'];
  //echo "$key";
 
}
//echo"$email";
//echo "$key";
if (isset($email) && isset($key)) {
//echo "in inner loop";
$uidnum = $_POST['uidno'];
//echo"$uidnum";
 // Update the database to set the "activation" field to null
//mysqli_connect('10.24.8.213', 'root', 'Password1') or die(mysqli_error());
//mysqli_select_db('llddaapp') or die(mysqli_error()); 
$servername = "localhost";
$username = "root";
$password = "Password1";
$dbname = "llddaapp";

$con = mysqli_connect($servername,$username,$password,$dbname);

$list = mysqli_query($con,"select * from ldap where  Email_id='$email' and activation='$key'");
        while ($row = mysqli_fetch_assoc($list)) {
	//print_r($row);
	  $name=$row['Name'];
     
        $employee=$row['Employee_No'];
        
        $department=$row['Department'];
        $facul=$row['Faculty'];
        $designation=$row['Designation'];
        $valid=$row['Validity_Date'];
        $phoneno=$row['Phone_No'];
        $mobileno=$row['Mobile_No'];

}
//echo "$uidnum";
$query_activate_account = "UPDATE ldap SET activation='NULL', uid='$uidnum' WHERE(Email_id ='$email' AND activation='$key')LIMIT 1";
//echo "$query_activate_account";




 $result_activate_account = mysqli_query($con, $query_activate_account);

if (mysqli_affected_rows($con) == 1)
{
	//echo "$mail";
//use PHPMailer\PHPMailer\PHPMailer;
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
                $mail->Password='Abi27%tha';
                $mail->Host     = "smtp.iitm.ac.in";
                $mail->Mailer   = "smtp";
                $mail->Subject  = 'Application for Ldap Account approved by Project Co-ordinator';
                $html = true;
                $mail->IsHTML($html);

/**$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = 'abithapram@gmail.com';
$mail->Password = 'abi27%tha';
$mail->Subject = 'Application for Ldap Account approved by Project Co-ordinator';
$html = true;
$mail->IsHTML($html);**/


        $message='<br>Ldap Account Registration approved by Project Co-ordinator for this User<br></br> Name:'.$name.'<br>Employee No:'.$employee.'<br>Department:'.$department.'<br>Faculty:'.$facul.'<br>Designation:'.$designation.'<br>Validity Date:'.$valid.'<br>Phone no(office/Lab):'.$phoneno.'<br>Mobile no:'.$mobileno.'<br>Email ID:'.$email.'<br>UID Number:'.$uidnum.'<br>';

        //echo"$message";
        $mail->Body = $message;
        $from="eservices@iitm.ac.in";
         $fromName = 'Eservices';
        $mail ->AddAddress('sanand@iitm.ac.in');
        $mail->From = $from;
	$mail->FromName = $fromName;
	$recipients = array('ccprj51@iitm.ac.in','ccprj40@iitm.ac.in','ccprj22@iitm.ac.in','ccprj37@iitm.ac.in','sanand@iitm.ac.in');
	foreach($recipients as $email )
	{
		$mail ->AddAddress($email);}
        
	//print_r($mail);
        if($mail->send())
	{
	        echo '<div class="success">Thank you for your approval & user details will be mailed to you shortly.</div>';
                echo "\n";

        }
	else
	echo"message not sent";

      }
     else
 {

         echo '<div class="warning">You already approved this Registration.</div>';
 }
 mysqli_close($con);

}
else {
 echo '<div>Error Occured .</div>';
}
?>
</body></html>
