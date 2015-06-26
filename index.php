<?php
	//db connection
	include 'conn.php';
	
	//load config
	$fields = json_decode(file_get_contents('config.json'));
	
	//query processed image
	$marks = array();
	$q = mysqli_query($conn, "SELECT * FROM mark");
	while ($mark = mysqli_fetch_array($q)) {
		$marks[] = $mark['image_name'];
	}
	
	//load folder and find unprocessed image
	$found = false;
	$filename = '';
	$folder = opendir('upload');
	while (($file = readdir($folder)) !== false && !$found) {
		if (strlen($file)>2 && !in_array($file,$marks)) {
			$filename = $file;
			$found = true;
		}
	}
	closedir($folder);
	
	//all images processed
	if (!$found) {
		echo 'All images done';
	} else {
?>
	<form method="post" action="process.php">
		<div class="form-group">
			<img src="upload/<?php echo $filename; ?>" />
			<input type="hidden" name="image_name" value="<?php echo $filename; ?>" />
		</div>
		<br />
<?php foreach ($fields as $field) { ?>
		<div class="form-group">
			<label><?php echo $field->label; ?></label>
			<input type="text" name="<?php echo $field->name; ?>" class="form-control" placeholder="Enter <?php echo $field->label; ?>" required />
		</div>
<?php } ?>
		<br />
		<input type="submit" name="submit" class="btn btn-primary" value="Save" />
	</form>
<?php } ?>