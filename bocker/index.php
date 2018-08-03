 <?php include("{$_SERVER['DOCUMENT_ROOT']}/templates/header.php"); ?>
  <div class="row">
 	<a class="btn btn-primary" href="/add.php">Add new book</a>
 </div>
 <?php 
 	echo "<div class='row'>";
	 	$sql = "SELECT id, title, author, genre, pubyear FROM books";
	 	$result = $conn->query($sql);
	 	if ($result->num_rows > 0) {
	 		echo "<table class='table'>";
	 		echo "<tr>";
	 		echo "<th>ID</th>";
	 		echo "<th>Title</th>";
	 		echo "<th>Author</th>";
	 		echo "<th>Genre</th>";
	 		echo "<th>Publication Year</th>";
	 		echo "<th colspan='2'>Control</th>";
	 		echo "</tr>";
		   	// output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>";
		        echo "<td>".$row['id']."</td>";
		        echo "<td>".$row['title']."</td>";
		        echo "<td>".$row['author']."</td>";
		        echo "<td>".$row['genre']."</td>";
		        echo "<td>".$row['pubyear']."</td>";
		        echo "<td><a href='/edit.php?id=".$row['id']."'>Edit</a></td>";
		        echo "<td><a href='/delete.php?id=".$row['id']."'>Delete</a></td>";
		        echo "</tr>";
		    }
		    echo "</table>";
		} else {
			echo "<h3>Add some books first!</h3>";
		}
		$conn->close();
	echo "</div>";
include("{$_SERVER['DOCUMENT_ROOT']}/templates/footer.php"); 
?>


