<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

	<div id="navbar">
	  <a href="index.html">Home</a>
	  <a href="index.php">Info</a>
	  <a href="#contact">Contact</a>
	</div>
	
	<div class="center">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="dbname">Database</label><br>
			<input type="text" id="dbname" name="dbname" value=" "><br>
			<label for="table">Table</label><br>
			<input type="text" id="table" name="table" value=" "><br><br>
			<input type="submit" name="execute" value="Execute PHP Script">
		</form>
	</div>
	
	<div class="margin">
		<?php
/*		if (isset($_POST['execute'])) {
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = $_POST['dbname'];
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * FROM ".$_POST['table'];
			$result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>EmployeeID</th><th>LastName</th><th>FirstName</th><th>Title</th><th>TitleOfCourtesy</th><th>BirthDate</th><th>HireDate</th><th>Address</th><th>City</th><th>Region</th><th>PostalCode</th><th>Country</th><th>HomePhone</th><th>Extension</th><th>Notes</th><th>ReportsTo</th><th>PhotoPath</th><th>Salary</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["EmployeeID"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "<td>" . $row["TitleOfCourtesy"] . "</td>";
                    echo "<td>" . $row["BirthDate"] . "</td>";
                    echo "<td>" . $row["HireDate"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["IdCity"] . "</td>";
                    echo "<td>" . $row["Region"] . "</td>";
                    echo "<td>" . $row["PostalCode"] . "</td>";
                    echo "<td>" . $row["Country"] . "</td>";
                    echo "<td>" . $row["HomePhone"] . "</td>";
                    echo "<td>" . $row["Extension"] . "</td>";
                    echo "<td>" . $row["Notes"] . "</td>";
                    echo "<td>" . $row["ReportsTo"] . "</td>";
                    echo "<td>" . $row["PhotoPath"] . "</td>";
                    echo "<td>" . $row["Salary"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results found";
            }
			$conn->close();
		}
		*/?>
        <?php
        include "Database.php";
        if (isset($_POST['execute'])){
            $db = new Database();
            $table = $db->select("SELECT * FROM ".$_POST['table']);
        }
        ?>
	</div>
	
	<script>
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
				document.getElementById("navbar").style.top = "0";
			} 
			else {
				document.getElementById("navbar").style.top = "-50px";
			}
		prevScrollpos = currentScrollPos;
		}	
	</script>
	
	<div class="footer" id="footer">
		 <p>Made by: 
			<a href="https://www.instagram.com/ivaylo.kolev1/" class="insta">
			Ivaylo Kolev
			</a>
		 </p>
	</div>
	
	<script>
		window.addEventListener('scroll', function() {
			var footer = document.getElementById('footer');
			var scrollPosition = window.innerHeight + window.pageYOffset;
			var documentHeight = document.body.offsetHeight;

			  if (scrollPosition >= documentHeight) {
				footer.style.bottom = '0'; /* Show the footer */
			  } else {
				footer.style.bottom = '-50px'; /* Hide the footer */
			  }
		})
	</script>
</body>