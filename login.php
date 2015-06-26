<?php 
include 'header.php';
if (isset($_POST['submit'])) {
	$q = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_POST['email']."'");
	$d = mysqli_fetch_array($q);
	if (isset($d) && $d['password']==md5($_POST['password'])) {
		$_SESSION['user_id'] = $d['user_id'];
		$_SESSION['username'] = $d['username'];
		header('location: index.php');
	} else $msg = 'Wrong email or password';
}
?>

	<div class="container">
		<div class="starter-template">
			<h1>LOGIN</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<div class="form-group">
						<label for="email">Email or Username</label>
						<input type="text" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-block">Login</button><br>
					<?php if (isset($msg)) echo '<p style="text-align:center;"><b>'.$msg.'</b></p>'; ?>
					<p>Belum punya akun? Daftar <a href="register.php">di sini</a>.</p>
					<p>Lupa password? Reset <a href="reset.php">di sini</a>.</p>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>