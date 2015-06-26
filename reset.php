<?php include 'header.php'; ?>

	<div class="container">
		<div class="starter-template">
			<h1>RESET PASSWORD</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label for="password2">Konfirmasi Password</label>
						<input type="password" class="form-control" id="password2">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Reset</button><br>
					<p>Sudah punya akun? Login <a href="login.php">di sini</a>.</p>
					<p>Belum punya akun? Daftar <a href="register.php">di sini</a>.</p>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>