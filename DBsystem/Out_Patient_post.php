<html>
	<head>
		<title>out patient</title>
	</head>
	
	<style>
 			body {
              			  background-image: url(out.jpg);            
               			  background-size: 100%;
              			  background-origin: content;
             			}
	</style>
	
	<body>
		<h1>OUT PATIENT DATA</h1>
		<?php
			$lab_number=$_POST['Lab_No'];
			$patient_id=$_POST['admition'];
			$date=$_POST['date'];
			$doc_id=$_POST['Doc'];
			$Description=$_POST['comments'];
			
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
		
			
			$sql = "INSERT INTO OUT_PATIENT
			(Lab_No,Patient_ID,Date,Doc_ID,Description)
			VALUES
			($lab_number,$patient_id,$date,$doc_id,'$Description')";
			
			
			
			echo "<p>la number :  $lab_number</p>";
			echo "<p>patient id number :  $patient_id</p>";
			echo "<p>date :  $date</p>";
			echo "<p>doctor id number :  $doc_id</p>";
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		?>
	</body>
</html>