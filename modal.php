<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
  <!--script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script-->
<script src="modalpopper.min.js"></script>
<script src="modalbootstrap.bundle.min.js"></script>
</head>
<body>

<div class="">
 <span data-toggle="tooltip"data-placement="left"title="policy for getting an email account"> 
  <!-- Button to Open the Modal --->
<button type="button" class="primary" data-toggle="modal" data-target="#myModal">

    Policy
  </button>
</span>


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Open LDAP Online Request</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  
<p style ="text-align:left;">This portal is for creating LDAP account for newly joined Project Staff  for accessing the below service:</p>
<ul>
<li>Institute Internet <a href="https://netaccess.iitm.ac.in/account/index">https://netaccess.iitm.ac.in/account/index</a></li>
<li>Online Equipment Booking <a href="http://web.iitm.ac.in/booked/">http://web.iitm.ac.in/booked/</a></li>
</ul>
<p style ="text-align:left;"><strong>Eligible</strong> people are as follows:</p>
<ul>
<li>Employee
 <ul>
   <li>Project Staff</li>
   <li>Post Doctoral Fellow/Senior Research Fellow/Junior Research Fellow</li>
   <li>Women Scientist/Senior Scientist/Young Scientist</li>
   <li>Trainee/Summer Intern</li>
   <li>Username
     <ul>
       <li>By default,LDAP username for permanent staff will be their ADS id followed by trailing 1.</li>
       <li>Example:ADS username:blabla,LDAP username will be blabla1</li>
        <li>By default,username will be the employee number</li>
       <li>Example:IC34998</li>
     </ul>
  </ul>
</li>
<li>IITM Students
 <ul>
   <li>Username
     <ul>
      
       <li>By default,username will be the student roll number(as per the list given by academic section IITM)</li>
       <li>Example:ae10s001</li>
     </ul>
    </li>
   </ul>
</li>
<li><strong>Note:IITM Students need not apply online</strong></li>

<p><strong>Approval Procedure</strong>(Approval is based on the designation category)</p>
<ul>
<li>If<strong> designation=others,summer internship,trainee</strong>,approval will be sent to the faculty email address</li>
<li>For all other designation,approval will be sent to ISCR</li>
<li>Unique identification number(UID)will be generated from ICSR</li>
<li>Faculty/ICSR will be login with username and password</li>
<li>Account will be created within 24 working hours from the date of approval</li>
<li><strong>Along with LDAP,IMAIL account(Institute Mail)also be created for ICSR sponsored project staffs(only)</strong></li>
</ul>

<p><strong>Validity of Accounts</strong></p>
<ul>
<li>Accounts will be valid untill the project duration(As per the validity period of ID card)</li>
<li><strong>Accounts will be disabled on the date of validity expiration</strong></li>
<li>Accounts will be removed after 30 days,if there is no account renewal request from the user</li>
</ul>
<p>For queries mail to<strong> sanand@iitm.ac.in</strong> and for assistance call helpdesk@5984</p>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>
