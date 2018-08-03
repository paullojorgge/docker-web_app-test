<?php include("{$_SERVER['DOCUMENT_ROOT']}/templates/header.php"); ?>
<div class="row">
	<h2>Add new book</h2>
</div>
<div class="row">
	<form action="/create.php" class="form" method="POST">
		<div class="form-group">
	    <label for="title">Book title</label>
	    <input type="text" class="form-control" id="title" name="title" placeholder="Book title">
	  </div>
	  <div class="form-group">
	    <label for="author">Author</label>
	    <input type="text" class="form-control" id="author" name="author" placeholder="Author">
	  </div>
	  <div class="form-group">
	    <label for="genre">Genre</label>
	    <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre">
	  </div>
	  <div class="form-group">
	    <label for="pubyear">Publication Year</label>
	    <input type="text" class="form-control" id="pubyear" name="pubyear" placeholder="Publication year">
	  </div>
	  <button type="submit" name="submit" class="btn btn-danger">Submit</button>
	  <a href="/" class="btn btn-default">Cancel</a>
	</form>
</div>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/templates/footer.php"); ?>