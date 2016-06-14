<html>
	<head>
		<title>PATIENT POST</title>
	</head>
	
	<style>
	body {
              			  background-image: url(lab.jpg);            
               			  background-size: 100%;
             			}
	
	</style>
 
	<body>
		<h1>LAB Information</h1>
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
		
			
			$sql = "SELECT * FROM LAB";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0) {
				
				echo"<table>";
				echo"<tr>";
				echo"<th>Lab No</th>";
				echo"<td></td>";
				echo"<th>Name</th>";
				echo"<td></td>";
				echo"<th>Head Doctor ID</th>";
				echo"</tr>";
				
				
			// output data of each row
			while($row = $result->fetch_assoc()) {
					echo"<tr>";
					echo "<td>". $row["Lab_No"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Lab_Name"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Head_Doc_ID"]."</td>";
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