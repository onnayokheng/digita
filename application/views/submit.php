	<div class="container">
		<div class="starter-template">
			<h1>SUBMIT DATA</h1>
		</div>
	</div>
	<?php
		
		//load config
		$fields = json_decode(file_get_contents('config.json'));
		
		//query processed image
		$marks = array();
		foreach ($q as $mark) {
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
		
	?>
	<div class="container">
		<?php if (!$found) { ?>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Completed!</strong> Data sudah diupdate semua!
				</div>
			</div>
		</div>
		<?php } else { ?>
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="<?php echo base_url(); ?>upload/<?php echo $filename; ?>" class="img-responsive" alt="">
				</div>
			</div>
			<div class="col-md-8">
				<form method="post" action="<?php echo base_url(); ?>site/process">
					<?php foreach ($fields as $field) { ?>
							<div class="form-group">
								<label><?php echo $field->label; ?></label>
								<input type="text" name="<?php echo $field->name; ?>" class="form-control" placeholder="Enter <?php echo $field->label; ?>" required />
							</div>
					<?php } ?>
					<input type="hidden" name="image_name" value="<?php echo $filename; ?>" />
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>