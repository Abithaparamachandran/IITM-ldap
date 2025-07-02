<?php
include "dbconfig.php";
require_once('tcpdf/tcpdf.php'); 

$sql = "SELECT * FROM ldap";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .container {
            padding-right: 20px; /* Adjusted padding to prevent overflow */
            margin-top: 80px;
            margin-bottom: 80px;
            border: none !important;
            box-shadow: 0 9px 50px 0 rgba(0, 0, 0, 0.6);
            width: 100%;
            background: #ebebe0;
        }
    </style>
</head>
<body>
    <form method="post" action="export.php" align="center">
        <input type="submit" name="export" value="PDF Export" class="btn btn-success" />
    </form>
    <div class="container">
        <h2>Users</h2>
        <hr>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th>SendMail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Employee_No']; ?></td>
                            <td><?php echo $row['Department']; ?></td>
                            <td><?php echo $row['Faculty']; ?></td>
                            <td><?php echo $row['Designation']; ?></td>
                            <td><?php echo $row['Validity_Date']; ?></td>
                            <td><?php echo $row['Phone_No']; ?></td>
                            <td><?php echo $row['Mobile_No']; ?></td>
                            <td><?php echo $row['Email_id']; ?></td>
                            <td><?php echo $row['Filename']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['SendMail']; ?></td>
                            <td>
                                <form method="POST" action="sendmail.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="submit" name="sendmail" value="Send Mail" class="btn btn-primary">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='15'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_POST['export'])) {
      
	            require_once('tcpdf/tcpdf.php');

		           
		            class MYPDF extends TCPDF {
				              
				                public function Header() {
							               
							                $this->SetFont('helvetica', 'B', 12);
									             
									                $this->Cell(0, 10, 'User Details', 0, false, 'C', 0, '', 0, false, 'M', 'M');
									               
									                $this->Ln(10);
											            }

						           
						            public function Footer() {
								                   
								                    $this->SetY(-15);
										              
										                    $this->SetFont('helvetica', 'I', 8);
										                   
										                    $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
												                }
						        }

		         
		            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		           
		            $pdf->SetCreator(PDF_CREATOR);
			            $pdf->SetAuthor('Your Name');
			            $pdf->SetTitle('User Details');
				            $pdf->SetSubject('User Details');
				            $pdf->SetKeywords('TCPDF, PDF, user, details');

					           
					            $pdf->AddPage();

					            
					            $pdf->SetFont('helvetica', '', 10);

						            
						            $sql = "SELECT * FROM ldap";
						            $result = $conn->query($sql);
							            if ($result->num_rows > 0) {
									                
									                $pdf->Ln(10);
											            $header = array('ID', 'Name', 'Employee No', 'Department', 'Faculty', 'Designation', 'Validity Date', 'Phone No', 'Mobile No', 'Email ID', 'Filename', 'Username', 'Password', 'SendMail');
											            $pdf->SetFillColor(230, 230, 230);
												                $pdf->SetFont('helvetica', 'B', 10);
												                $w = array(15, 30, 30, 30, 30, 30, 25, 25, 25, 40, 30, 20, 20, 20);
														            for ($i = 0; $i < count($header); ++$i) {
																                    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
																		                }
														            $pdf->Ln();

														           
														            while ($row = $result->fetch_assoc()) {
																                    $pdf->Cell($w[0], 6, $row['id'], 'LR', 0, 'C', 0);
																		                    $pdf->Cell($w[1], 6, $row['Name'], 'LR', 0, 'C', 0);
																		                    $pdf->Cell($w[2], 6, $row['Employee_No'], 'LR', 0, 'C', 0);
																				                    $pdf->Cell($w[3], 6, $row['Department'], 'LR', 0, 'C', 0);
																				                    $pdf->Cell($w[4], 6, $row['Faculty'], 'LR', 0, 'C', 0);
																						                    $pdf->Cell($w[5], 6, $row['Designation'], 'LR', 0, 'C', 0);
																						                    $pdf->Cell($w[6], 6, $row['Validity_Date'], 'LR', 0, 'C', 0);
																								                    $pdf->Cell($w[7], 6, $row['Phone_No'], 'LR', 0, 'C', 0);
																								                    $pdf->Cell($w[8], 6, $row['Mobile_No'], 'LR', 0, 'C', 0);
																										                    $pdf->Cell($w[9], 6, $row['Email_id'], 'LR', 0, 'C', 0);
																										                    $pdf->Cell($w[10], 6, $row['Filename'], 'LR', 0, 'C', 0);
																												                    $pdf->Cell($w[11], 6, $row['Username'], 'LR', 0, 'C', 0);
																												                    $pdf->Cell($w[12], 6, $row['Password'], 'LR', 0, 'C', 0);
																														                    $pdf->Cell($w[13], 6, $row['SendMail'], 'LR', 0, 'C', 0);
																														                    $pdf->Ln();
																																                }
															                $pdf->Cell(array_sum($w), 0, '', 'T');
															            } else {
																	                $pdf->Cell(0, 10, 'No records found', 0, false, 'C', 0, '', 0, false, 'T', 'M');
																			        }

    
							            $pdf->Output('user_details.pdf', 'D');}
							        ?>
</body>
</html>
