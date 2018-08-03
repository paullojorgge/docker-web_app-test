<?php 
	if(isset($_POST["submit"])){
		include 'database.php';
		# DO NOT USE THIS IN ANY PRODUCTION ENVIRONMENT AS IT IS NOT SECURE. THIS IS ONLY FOR DEMOSTRATION PURPOSES
		$sql = "INSERT INTO books (title, author, genre, pubyear) VALUES ('".$_POST["title"]."','".$_POST["author"]."','".$_POST["genre"]."','".$_POST["pubyear"]."')";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			header('Location:/');
		} else {
			echo "Database connection error:".$conn->error;
		}
	}
?>