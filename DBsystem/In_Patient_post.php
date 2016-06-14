<html>
	<head>
		<title>IN PATIENT FILLED FORM </TITLE>
	</head>
	
	<style>
 			body {
              			  background-image: url(inpatient2.jpg);            
               			  background-size: 100%;
              			  background-origin: content;
				 opacity:20;
            			}
	</style>
	
	<body>
		<h1>FILLED IN PATIENT FORM</h1>
		<?php
			$Ward_number=$_POST['Ward_No'];
			$admission_date=$_POST['admition'];
			$discharge_date=$_POST['discharge'];
			$patient_id=$_POST['patient'];
			$Room_No=$_POST['Room_No'];
			$Room_Type=$_POST['Type'];
			
			$servername = "localhost";
			$username = "root";
			$password = "1234";
			$dbname = "HospitalManagement";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		
			
			$sql = "INSERT INTO IN_PATIENT
			(Ward_No,Admition_Date,Discharge_Date,Patient_ID)
			VALUES
			($Ward_number,$admission_date,$discharge_date,$patient_id)";
			
			$sql = "INSERT INTO ROOM
			(Room_No,Type,Ward_No,Patient_ID)
			VALUES
			($Room_No,'$Room_Type',$Ward_number,$patient_id)";
			
			
			
			echo "<p>ward number :  $Ward_number</p>";
			echo "<p>admission date:  $admission_date</p>";
			echo "<p>discharge date :  $discharge_date</p>";
			echo "<p>patient id number :  $patient_id</p>";
			echo "<p>Room No :  $Room_No</p>";
			echo "<p>Room Type :  $Room_Type</p>";
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		?>
	</body>
</html>