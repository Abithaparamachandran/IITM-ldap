<!DOCTYPE html>
<html>
<head>
    <title>LDAP Data Viewer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .container {
            padding-right: 20px;
            margin-top: 80px;
            margin-bottom: 80px;
            border: none!important;
            box-shadow: 0 9px 50px 0 rgba(0,0,0,0.6);
            width: 100%;
            background: #ebebe0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>LDAP Data</h2>
        <hr>
        <form method="post" action="pdfexport.php" align="center">
            <input type="submit" name="export" value="PDF Export" class="btn btn-success" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Employee_No</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Designation</th>
                    <th>Validity_Date</th>
                    <th>Phone_No</th>
                    <th>Mobile_No</th>
                    <th>Email_id</th>
                    <th>Filename</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mysqli = new mysqli("***", "***", "***", "***");
                if ($mysqli->connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                    exit();
                }

		                $query = "SELECT * FROM ***";
		                if ($result = $mysqli->query($query)) {
					                    while ($row = $result->fetch_assoc()) {
							     echo "<tr>";
							     echo "<td>".$row['id']."</td>";
							     echo "<td>".$row['Name']."</td>";
							     echo "<td>".$row['Employee_No']."</td>";
							     echo "<td>".$row['Department']."</td>";
							     echo "<td>".$row['Faculty']."</td>";
							     echo "<td>".$row['Designation']."</td>";
					                     echo "<td>".$row['Validity_Date']."</td>";
							     echo "<td>".$row['Phone_No']."</td>";
							     echo "<td>".$row['Mobile_No']."</td>";
						             echo "<td>".$row['Email_id']."</td>";
							     echo "<td>".$row['Filename']."</td>";
							     echo "</tr>";
							  $result->free();
							                    }
				                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

