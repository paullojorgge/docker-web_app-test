<?php 
include("{$_SERVER['DOCUMENT_ROOT']}/templates/header.php");
include 'database.php';
$id=$_GET['id'];
$sql = "SELECT * FROM books WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>
<div class="row">
	<h2>Edit book</h2>
</div>
<div class="row">
	<form action="/update.php" class="form" method="POST">
		<div class="form-group">
	    <label for="title">Book title</label>
	    <input type="text" class="form-control" id="title" name="title" placeholder="Book title" value="<?php echo $row['title'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="author">Author</label>
	    <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="<?php echo $row['author'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="genre">Genre</label>
	    <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre" value="<?php echo $row['genre'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="pubyear">Publication Year</label>
	    <input type="text" class="form-control" id="pubyear" name="pubyear" placeholder="Publication year" value="<?php echo $row['pubyear'] ?>">
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id ?>">
	  <button type="submit" name="submit" class="btn btn-danger">Submit</button>
	  <a href="/" class="btn btn-default">Cancel</a>
	</form>
</div>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/templates/footer.php"); ?>