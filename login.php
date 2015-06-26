<?php include 'header.php'; ?>

	<div class="container">
		<div class="starter-template">
			<h1>LOGIN</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Login</button><br>
					<p>Belum punya akun? Daftar <a href="register.php">di sini</a>.</p>
					<p>Lupa password? Reset <a href="reset.php">di sini</a>.</p>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>