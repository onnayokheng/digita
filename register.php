<?php include 'header.php'; 
if (isset($_POST['submit'])) {
	$q = mysqli_query($conn, "SELECT username FROM user WHERE username = '".$_POST['email']."'");
	if (mysqli_num_rows($q)==0) {
		$q = mysqli_query($conn, "INSERT INTO user VALUES ('".md5($_POST['email'])."','".$_POST['email']."','".md5($_POST['password'])."','Member')");
		$msg = 'Register success';
	} else $msg = 'Email has been registered';
}
?>

	<div class="container">
		<div class="starter-template">
			<h1>Register</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<!--<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" class="form-control" name="name">
					</div>-->
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" onblur="if (document.getElementById('password2').value!='') (this.value==document.getElementById('password2').value)?document.getElementById('password2').setCustomValidity(''):document.getElementById('password2').setCustomValidity('New password do not match.')" required>
					</div>
					<div class="form-group">
						<label for="password2">Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2" id="password2" onblur="(this.value==document.getElementById('password').value)?this.setCustomValidity(''):this.setCustomValidity('New password do not match.')" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button><br>
					<?php if (isset($msg)) echo '<p style="text-align:center;"><b>'.$msg.'</b></p>'; ?>
					<p>Sudah punya akun? Login <a href="login.php">di sini</a>.</p>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>