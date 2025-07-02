
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">

.error {
        color: #ff0000;
        background-color: #ffffff;
        background-image:url('images/success.png');
}
</style></head><body>

<?php 
//echo "hi";
use PHPMailer\PHPMailer\PHPMailer;
ob_start();
if(isset($_POST['submit']))
{
   $servername="***";
   $username="***";
   $password="***";
   $dbname="***";
   $con=mysqli_connect($servername,$username,$password,$dbname);
   if(!$con)
	   {
	   trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	   }

$name = $_POST['name'];
$employee=$_POST['empno'];
if (empty($_POST['dept_1']))
                 {
                  $error[] = 'Please Enter Department name '; //add to array "error"
                }
                 else {$dept=$_POST['dept_1'];}
                 if (empty($_POST['faculty']))
                 {
                  $error[] = 'Please Enter Faculty Name'; //add to array "error"
                }
                 else
                 {
                 $faculty=$_POST['faculty'];
preg_match('#\[(.*?)\]#', $faculty, $match);
$facmail= $match[1];

                 }

               // echo "after faculty";
                if (empty($_POST['select1']))
                 {
                  $error[] = 'Please Enter designation name '; //add to array "error"
                }
                else {$designation=$_POST['select1'];}




$date=$_POST['validity'];
 $phoneno = $_POST['phno'];
 $mobileno = $_POST['mobno'];
            $email=$_POST['emailid'];
     



 function getExtension($str)
{
	 $i = strrpos($str,".");
	 if (!$i) { return ""; }
	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}

//echo "before file upload";
if (isset($_FILES["file"]["name"])) {
	//echo "file name exist";
$errors=0;
$image=$_FILES['file']['name'];
if ($image) 
{

	//echo "image exist";
	$filename = stripslashes($_FILES['file']['name']);
	//echo $filename;
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	//echo "extension is".$extension;
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
		&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
		&& ($extension != "PNG") && ($extension != "GIF") && ($extension != "pdf")) 
	{
		echo "unknown";
		$error[]='Unknown extension!';
		$errors=1;
	}
	else
	{
		//echo "else not pdf";
	if($extension != "pdf")
	{
		//echo "jj";
	$image_info = getimagesize($_FILES["file"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];
if($image_width <= 600 && $image_height<= 500)
{

		if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
     $error[]= "Filename already exists.Rename it";
      }  
	  else
	  {
	  $image_name=time().'.'.$extension;
		$newname="upload/".$image_name;
        $copied = copy($_FILES['file']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo 'not copied';
			$errors=1;
		}
		else 
		echo '';
       }
 
	//	mysql_query("insert into file_tbl (path) values('".$newname."')");
}
	else {
		$error[]='Choose correct size file below 500kb';
		echo 'File Size Format Wrong';
    }

	
	}
	
	
	if($extension == "pdf")
	{
	if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      $error[]= "Filename already exists.Rename it";
      }  
	  else
	  {
	  $image_name=time().'.'.$extension;
		$newname="upload/".$image_name;
        $copied = copy($_FILES['file']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '';
			$errors=1;
		}
		else echo '';
       }
		
	}
	
	}
	
	 }
 else {
$error[]= 'Choose a correct size file';
        //$newname='';
    }
}
	
	//end of upload
//print_r($error);
if(empty($error))
{
	//echo "error free";
       // echo "empty";
	$servername="***";
	$username="***";
	$password="***";
	$dbname="***";
	$con=mysqli_connect($servername,$username,$password,$dbname);
        
	if(mysqli_num_rows($result_verify_mobno) ==0)
	{
	$query_verify_mobno = "SELECT * FROM *** WHERE Mobile_No ='$mobileno'";
        $result_verify_mobno = mysqli_query($con, $query_verify_mobno);
	if(!$result_verify_mobno){
		echo'mobile number already exists';
	}
	if(mysqli_num_rows($result_verify_mobno) ==0)
	{

	if (mysqli_num_rows($result_verify_email) ==0)
	{
        $query_verify_email = "SELECT * FROM ldap  WHERE Email_id ='$email'";
          $result_verify_email = mysqli_query($con, $query_verify_email);
        if (!$result_verify_email) { 
            echo ' Database Error Occured ';
	}
	if(mysqli_num_rows($result_verify_email) ==0)
	{


	      if (mysqli_num_rows($result_verify_empno) == 0)
	      {
		      $query_verify_empno="SELECT * FROM *** WHERE Employee_No='$employee'";
		      $result_verify_empno = mysqli_query($con, $query_verify_empno);
		      if (!$result_verify_empno)
			       echo 'Employee Number already exists';
        }
	      if (mysqli_num_rows($result_verify_empno) == 0)
		{

$regdate = date('Y-m-d');
		$activation = md5(uniqid(rand(), true));
$query_insert_user ="INSERT INTO ***(Name,Employee_No,Department,Faculty,Designation,facultymail,Validity_Date,Phone_No,Mobile_No,Email_id,uid,registration_date,activation,Filename) VALUES ('$name','$employee','$dept','$faculty','$designation','$facmail','$date','$phoneno','$mobileno','$email',' ','$regdate','$activation','$newname')";

$result_insert_user = mysqli_query($con, $query_insert_user);
						if (!$result_insert_user) 
						{
						//	echo 'Query Failed ';
						}
  //use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
//echo "after object creation";
		$mail->IsSMTP(); // send via SMTP
              //  $mail->SMTPDebug = 1;
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = "**";
       	      // $mail->SMTPSecure = "ssl";
	        $mail->Port       = 587;
                $mail->Username='***';
		$mail->Password='***';
		$mail->Host     = "***";
                $mail->Mailer   = "***";
		$mail->Subject  = 'Approval for ldap';
		$html = true;
		$mail->IsHTML($html);
		$message = '<br>The following user registered for Internet Access and it is pending for your approval<br></br>Name:'.$name.'<br>Department:'.$dept.'<br>Employee no:'.$employee.'<br>Mobile:'.$mobileno.'<br>Emailid:'.$email.'<br><br>Your Project Staff has requested for Internet Access<br><br>';
		$message .= "<a href='https://web.iitm.ac.in/ldaponline/test.php?email=$email&key=$activation'>Click here to approve this registration</a>";
		$mail->Body = $message;
		$from = '***';
		$fromName = 'Eservices';
		if($designation=="Trainee" || $designation=="Summer Internship" || $designation=="Others" )
{
		$to = "$facmail";
		}
		else
{
	$to = "icsradmin@imail.iitm.ac.in";
	}
		$mail->From = $from;
		$mail->FromName = $fromName;
		$mail->AddAddress($to);
				 if($mail->Send())
				 {
					 $today = date("Y-m-d H:i:s");
		$file = 'log.txt';
$msg = "\n$today $email,$facmail--------- Message Sent";
file_put_contents($file, $msg, FILE_APPEND | LOCK_EX);
					            if (mysqli_affected_rows($con) == 1) { //If the Insert Query was successfull.
header("Location: success.php");
            }}}}
				}
				 else 

				// 	 echo 'Message could not be sent.';
    echo 'Email already exists: ' . $mail->ErrorInfo;
					echo"Message not sent";
	      }
	      else
	      {
		      echo '<div class="error" style="margin-top:5px;">Unable to register.Check your employee no,mobile no & emailid.</div>';}}
				else { 
			
            echo '<div class="error">Try Again and select correct file format.Example:png-below 15kb,jpg-below 15kb,jpeg-below-140kb</div>';

        }
				
				}
else { 
}
}
   // mysqli_close($con);
				
    
				//}
?>
</body>
</html>
