<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.success {
        color: #4F8A10;
        height:50px;
        background-color: #DFF2BF;
        background-image:url('images/success.png');
        border: 1px solid;
        margin: 0 auto;
        padding:10px 5px 10px 50px;
        background-repeat: no-repeat;
        background-position: 10px center;
        font-weight:bold;
     width:400px;
}
</style>
</head>
<body>
</body>
</html>
<?php
session_start();
$designation=$_SESSION['select1'];
if($designation=="Trainee" || $designation=="Summer Internship" || $designation=="Others" ){
echo "<br>";
echo '<div class="success">Thank you for registering! An email has been sent to your Project Co-ordinator for approval</div>';
}
else{
echo "<br>";
echo '<div class="success">Thank you for registering! An email has been sent to ICSR Project Recruitment Section for approval</div>';
}
?>
