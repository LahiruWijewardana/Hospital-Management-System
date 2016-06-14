<html>
	<head>
		<title>LAB REPORT POST</title>
	</head>
	
	<style>
	body {
              			  background-image: url(labreport.jpg);            
               			  background-size: 42.5%;
              			  background-origin: content;
             			}
	
	</style>
 
	<body>
		<h1>Lab Report Information</h1>
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
		
			
			$sql = "SELECT * FROM LAB_REPORT";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0) {
				
				echo"<table>";
				echo"<tr>";
				echo"<th>Report No</th>";
				echo"<td></td>";
				echo"<th>Category</th>";
				echo"<td></td>";
				echo"<th>Date</th>";
				echo"<td></td>";
				echo"<th>Patient ID</th>";
				echo"<td></td>";
				echo"<th>Doctor ID</th>";
				echo"<td></td>";
				echo"<th>Description</th>";
				echo"</tr>";
				
				
			// output data of each row
			while($row = $result->fetch_assoc()) {
					echo"<tr>";
					echo "<td>". $row["Report_No"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Category"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Date"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Patient_ID"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Doc_ID"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Description"]."</td>";
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