<html>
	<head>
		<title>DOCTOR POST</title>
	</head>
	
	<style>
	body {
              			  background-image: url(doctor.jpg);            
               			  background-size: 160%;
              			  background-origin: content;
             			}
	
	</style>
 
	<body>
		<h1>Doctor Information</h1>
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
		
			
			$sql = "SELECT * FROM DOCTOR";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0) {
				
				echo"<table>";
				echo"<tr>";
				echo"<th>Doctor ID</th>";
				echo"<td></td>";
				echo"<th>Name</th>";
				echo"<td></td>";
				echo"<th>Address</th>";
				echo"<td></td>";
				echo"<th>Mobile</th>";
				echo"<td></td>";
				echo"<th>Home</th>";
				echo"</tr>";
				
				
				// output data of each row
				while($row = $result->fetch_assoc()) {
						echo"<tr>";
						echo "<td>". $row["Doc_ID"]."</td>";
						echo"<td></td>";
						echo "<td>". $row["Doc_Name"]."</td>";
						echo"<td></td>";
						echo "<td>". $row["Address"]."</td>";
						echo"<td></td>";
						echo "<td>". $row["Contact_No_Mobile"]."</td>";
						echo"<td></td>";
						echo "<td>". $row["Contact_No_Home"]."</td>";
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