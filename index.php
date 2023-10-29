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
			<input type="text" id="dbname" name="dbname" value=""><br> <!--dobravi proverka za space-->
			<label for="table">Table</label><br>
			<input type="text" id="table" name="table" value=""><br><br>
			<input type="submit" name="execute" value="Execute PHP Script">
		</form>
	</div>
	
	<div class="margin">
        <?php
        include "config.php";
        include "Database.php";
        if (isset($_POST['execute'])){
            $db = new Database();
            $table = $db->select("SELECT * FROM ".$_POST['table']);
            // Start the HTML table
            echo '<table>';
            echo '<tr>';
            echo '<th>EmployeeID</th>';
            echo '<th>Name</th>';
            echo '<th>Title</th>';
            echo '<th>Address</th>';
            echo '<th>IdCity</th>';
            echo '</tr>';
            foreach ($table as $employee) {
                echo '<tr>';
                echo '<td>' . $employee['EmployeeID'] . '</td>';
                echo '<td>' . $employee['FirstName'] . ', ' . $employee['LastName'] . '</td>';
                echo '<td>' . $employee['Title'] . '</td>';
                echo '<td>' . $employee['Address'] . '</td>';
                echo '<td>' . $employee['IdCity'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
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