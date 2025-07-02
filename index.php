<html lang="en">
<head>
<title>LDAP Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="jquery.min.js"></script>
<script src="2jquery.min.js"></script>
<script src="popper.min.js"></script>
<script src="bootstrap.bundle.min.js"></script>
<script src="bootstrapValidator.js"></script>


<style>
body
{
 /* margin:-85;*/
  paddding:50;
  font-family:'Arial';
overflow-x:hidden;
height:100%;
font-size:15;
}

.page-header {
        color:white;
        text-shadow: 0px -1px 0px #000;
/*      border-bottom: solid #181818 1px;*/
        -moz-box-shadow: 0px 1px 0px #3a3a3a;
        text-align: center;
        padding: 8px;
        margin: 0px;
        font-weight: normal;
        font-size: 18px;
        font-family: Lucida Grande, Helvetica, Arial, sans-serif;
/*      background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
         background:#19919e;
        }

.header {
  overflow: hidden;
  /* background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
   background: #19919e;


  padding: 90px;
  text-align:center;
  font-size:10px;


}
li span
{
        color:green;
}


.policy{
        text-align:right;
        font-size:10px;
}
.footer {
  text-align: center;
  padding: 3px;
/*   background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
   background: #19919e;


  color:black;
}
h1{
        text-algin:left;
        font-size:20;
        margin-left:70;
        color:white;
}
h3{

  text-align:center;
  margin-top:-112;
  font-size:20 ;
  padding:25px;
}
.container
{

padding:30px 10px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:40%;

}

ul
{
        text-color:green;
        text-align:left;
        font-size:17px;
}

.reg
{
   text-align:center;
   color:black;
   padding:10px;
   font-size:20;
}
label
{

  font-size:18px!important;
  font-weight:300;
  }
#img
{
margin-left:-30px;

        height:110px;
        margin-top:1px;


  padding:15px;
  width: 350px;
}
hr
{
        border:1px  black;
        border-radius:1px;
}
#blink {
            color:black;
            font-size: 20px;
            font-weight: bold;

            transition:none;
        }
.blinking-text{
        text-decoration:none;
        font style:italic;
        font-weight:bolder;
        background-color:grey;
}
</style>


<script>
 $(document).ready(function(){
 $("#empno").keyup(function(){
 var Employee_No = $(this).val().trim();
 if(Employee_No != ''){
 $.ajax({
 url: 'empfile.php',
 type: 'post',
 data: {Employee_No: Employee_No},
 success: function(response){
 $('#empname_response').html(response);
 }
 });
 }else{
 $("#empname_response").html("");
 }
 });
 });
 </script>

<script>
 $(document).ready(function(){
 $("#mobno").keyup(function(){
 var Mobile_No = $(this).val().trim();
 if(Mobile_No != ''){
 $.ajax({
 url: 'empfile.php',
 type: 'post',
 data: {Mobile_No: Mobile_No},
 success: function(response){
 $('#mobname_response').html(response);
 }
 });
 }else{
 $("#mobname_response").html("");
 }
 });
 });
 </script>

<script>
 $(document).ready(function(){
 $("#emailid").keyup(function(){
 var Email_id = $(this).val().trim();
 if(Email_id != ''){
 $.ajax({
 url: 'empfile.php',
 type: 'post',
 data: {Email_id: Email_id},
 success: function(response){
 $('#emailname_response').html(response);
 }
 });
 }else{
 $("#emailname_response").html("");
 }
 });
 });
 </script>


<script>
$(document).ready(function() {
$("#dept_1").change(function() {

$.get('newfac12.php?dept_1=' + $(this).val(), function(data) {

                        $("#faculty").html(data);
                                                                                                });
return false; // return false to stop the page submitting. You could have the form action set to the same PHP page so if people dont have JS on they can still use the form
});
});
</script>


</head>
<body>

<!--div class="container-fluid">


</div-->



<div class="page-header">
<img src="newlogo.png"class="img"alt="index" id="img">
</div>
<center>
<div class="container">
<form action="ldapmail.php"  method="POST" class="was-validated"id="form"  enctype="multipart/form-data" >






<div class="reg">
<p class="h2">Registration Form For LDAP Account</p>
<div class="policy">
<?php
include("modal.php");
?>


</div>



<div class="row">
<div class="col-md-4">
<label for="uname" class="form-label"><b>Name:</b></label></div>
<div class="col-md-6">
<input type="text" name="name" class="form-control"auto complete="off"placeholder="Enter alphabet characters only"  id="name"required >
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label for="empno" class="form-label"><b>Employee No: </b><font color="#000000" size="-4" style="font-weight:bold">(For summer internship,enter your college rollno)</font>  </label></div>
<div class="col-md-6">
<input type="empno" class="form-control" pattern="[Aa-Zz0-9]{8}" id="empno" name="empno"placeholder="Employee no without slashes" required>
 <div id="empname_response" ></div>
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label for="department"><b>Department:</b> </label></div>
<div class="col-md-6">
<select name="dept_1" id="dept_1"class="form-control"required>
<option value=""> Select Department </option>
<?php

  $servername = "***";
  $username = "***";
  $password = "***";
  $databasename = "***";

  // CREATE CONNECTION
  $conn = new mysqli($servername,
    $username, $password, $databasename);

  // GET CONNECTION ERRORS
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // SQL QUERY
  $query = "SELECT departmentname FROM `dept_1`;";

  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);

            while ($row = mysqli_fetch_assoc($result)) {
                $name[] = $row['departmentname'];

                }
foreach ($name as $templatePDFName) {
 echo '<option value="'. $templatePDFName . '"';
             if(isset($_POST['dept_1']) && $_POST['dept_1'] !='select'){if($templatePDFName == $_POST['dept_1']) echo ' SELECTED';}
            echo '>' . $templatePDFName . '</option>';
}




   // else {
     //   echo "0 results";
    //}

   $conn->close();

?>

</select>
</div></div><br>

<div class="row">
<div class="col-md-4">
<label for="faculty"><b>Faculty:</b></label></div>
<div class="col-md-6">
<select name="faculty" id="faculty"class="form-control"required>

<option value="<?php if(isset($_POST['faculty'])){ echo $_POST['faculty'];} ?>"><?php if(isset($_POST['faculty'])){ echo $_POST['faculty'];} ?></option>
                                        </select><?php if(isset($_POST['faculty']) && $_POST['faculty'] =='' ||
                                        isset($_POST['faculty']) && $_POST['faculty'] =='select'){ echo 'Select department for faculty'; } ?>

</div></div><br>
<div class="row">
<div class="col-md-4">
<label for="design"><b>Designation:</b></label></div>
<div class="col-md-6">
<select class="form-control" name="select1" id="design"placeholder="Enter designation" required >
<option></option>
<option>Project Assistant</option>
<option>Senior Project Assistant</option>
<option>Project Associate</option>
<option>Project Engineer</option>
<option>Project Technician</option>
<option>Project Officer</option>
<option>Senior Project Officer</option>
<option>Project Manager</option>
<option>Program Manager</option>
<option>Advisor</option>
<option>Project Scientist</option>
<option>Junior Executive</option>
<option>Senior Executive</option>
<option>Post Doctoral Fellow</option>
<option>Post Doctoral Researcher</option>
<option>Research Associate</option>
<option>Research Assistant</option>
<option>Junior Research Fellow</option>
<option>Senior Research Fellow</option>
<option>Women Scientist</option>
<option>Young Scientist</option>
<option>Senior Scientist</option>
<option>Trainee</option>
<option>Summer Internship</option>
<option>Others</option>
</select>
</div></div>


<br>
<div class="row">
<div class="col-md-4">
<label for="date"class="form-label"><b>Validity Date:</b></label></div>
<div class="col-md-6">
<input type="date"class="form-control" id="txtDate"name="validity"placeholder="Enter validity date from IDcard"min="<?php echo date("Y-m-d"); ?>"required>
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div>
</div>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

   // alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});
</script>


<br>
<div class="row">
<div class="col-md-4">
<label for="phonenumber"class="form-label"><b>Phone No(Office/Lab):</b></label></div>
<div class="col-md-6">
<input type="phoneno"class="form-control"maxlength="4"pattern="\d{4}" id="phone"name="phno"placeholder="Enter 4 digit extension no"required>
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div></div>
<br>
<div  class="row">
<div class="col-md-4">
<label class="form-label"for="mobileno"required><b>Mobile No:</b></label></div>
<div class="col-md-6">
<input type="mobno"class="form-control"maxlength="10"pattern="[123456789][0-9]{9}"id="mobno"name="mobno"placeholder="Enter 10 digit mobile no"required>
<div id="mobname_response" ></div>
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label class="form-label"for="email"required><b>Email ID:</b></label></div>
<div class="col-md-6">
<input type="email"class="form-control"id="emailid"name="emailid"placeholder="Enter your mailid" required>
<div id="emailname_response"></div>
<div class="valid-feedback"></div>
<div class="invalid-feedback"></div>
</div>
</div>

<br>
<div class="row">

<div class="col-md-4">
<label class="form-label"required><b>Upload scanned ID Card:</b></label></div>
<div class="col-md-6">
<input type="file" name="file" class="form-control"required/><font color="#000000" size="-6" style="font-weight:bold"><b>(Select correct size file format.Example:png-below 15kb,jpg-below 15kb,jpeg-below 140kb,pdf-below 500kb)</b></font>

</div></div>
                           
<br>


<button type="submit"name="submit" class="btn btn-primary"><b>Submit</b></button>

<!--div class="note">
<p id="blink">NOTE:</p>
</div>
<div="para">
<ul style="list-style-position:inside vertical-align: middle;">
<li><span>Faculty and staff who have their ADS account have their OpenLDAP account created already with the same login name expect the trailing numeral'1'(Example:ADS login:<mark><b>sanand</b></mark>,OpenLDAP login:<mark><b>sanand1</b></mark>).</span></li>
<li><span>Please don't register if you already have OpenLDAP account.</span></li>
<li><span>User accounts will be created within 2 working days from the date of approval.</span></li>
<li><span>For queries mail to:<mark><b>sanand@iitm.ac.in</b></mark></span></li>
</ul>
</div-->
</div>
</div>
</form>


    <!--script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 10 : 0);
        }, 2500);
    </script-->
<!--div class="blink">
<a class="blinking-text"id="text-blink"  href="login.php">Click here to register for Conference/Short-Term/Others!</a-->


 <!--script type="text/javascript">
        var blink = document.getElementById('text-blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 10 : 0);
        }, 2500);
    </script-->

<br>
</center>
</div>
<div class="footer">
<p>© E-Services Team, Computer Center</p>
</div>
</body>
</html>
  
