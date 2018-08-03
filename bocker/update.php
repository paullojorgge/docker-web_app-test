<?php 
	if(isset($_POST["submit"])){
		include 'database.php';
		# DO NOT USE THIS IN ANY PRODUCTION ENVIRONMENT AS IT IS NOT SECURE. THIS IS ONLY FOR DEMOSTRATION PURPOSES
		$sql = "UPDATE books SET title='".$_POST["title"]."',author='".$_POST["author"]."',genre='".$_POST["genre"]."',pubyear='".$_POST["pubyear"]."' WHERE id=".$_POST['id'];
		if ($conn->query($sql) === TRUE) {
			$conn->close();
			header('Location:/');
		} else {
			echo "Database connection error:".$conn->error;
		}
		// echo $sql;
	}
?>