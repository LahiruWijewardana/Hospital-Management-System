<html>
	<head>
		<title>PATIENT POST</title>
	</head>
	
	<style>
	body {
              			  background-image: url(patient3.jpg);            
               			  background-size: 110%;
              			  background-origin: content;
             			}
	
	</style>
 
	<body>
		<h1>Patient Information</h1>
		<?php
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
		
			
			$sql = "SELECT * FROM IN_PATIENT";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0) {
				
				echo"<table>";
				echo"<tr>";
				echo"<th>Ward No</th>";
				echo"<td></td>";
				echo"<th>Admition Date</th>";
				echo"<td></td>";
				echo"<th>Discharge Date</th>";
				echo"<td></td>";
				echo"<th>Patient ID</th>";
				
				echo"</tr>";
				
				
			// output data of each row
			while($row = $result->fetch_assoc()) {
					echo"<tr>";
					echo "<td>". $row["Ward_No"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Admition_Date"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Discharge_Date"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Patient_ID"]."</td>";
					
					echo"</tr>";
			}
			echo"</table>";
			} else {
				echo "0 results";
			}

			
			$conn->close();
		?>
	</body>
</html>