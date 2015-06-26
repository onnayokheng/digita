<?php include 'header.php'; ?>

	<section class="hero-wrap" data-bg-image="assets/img/bg.jpg">
		<div class="container">
			<div class="starter-template">
				<h1>DIGITA</h1>
				<p class="lead">Simple Apps for open source digital data.</p>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="page-title text-center">Database</h2><br><br>
			</div>
		</div>
		<div class="row">
			<?php
				$fields = json_decode(file_get_contents('config.json'));
				$q = mysqli_query($conn, "SELECT * FROM mark");
				if (mysqli_num_rows($q)==0) echo '<h3 class="text-center">No images processed</h3>';
				else {
					while ($mark = mysqli_fetch_array($q)) {
						$data = json_decode($mark['data'],true);
			?>
			<!-- item start -->
			<div class="col-sm-3 col-xs-6">
				<div class="item-wrap thumbnail">
					<a href="#" class="item-popup">
						<figure>
							<img src="upload/<?php echo $mark['image_name']; ?>" alt="" class="img-responsive">
						</figure>
						<section class="item-content">
							<h4 class="name"><?php echo $mark['image_name']; ?></h4>
							<div class="profile">
								<ul class="list-unstyled">
								<?php $i=0;
									foreach ($fields as $field) {
										if( empty($data[$i][$field->name])) continue; ?>
									<li><strong><?php echo $field->label; ?></strong>: <?php echo $data[$i][$field->name]; ?></li>
								<?php $i++; } ?>
								</ul>
							</div>
						</section>
					</a>
				</div>
			</div>
			<!-- end of item -->
			<?php 	}
				} ?>
		</div>
	</div>

<?php include 'footer.php'; ?>