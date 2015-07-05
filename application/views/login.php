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
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Login</button><br>
					<?php if ($this->session->flashdata('msg')!='') echo '<p style="text-align:center;"><b>'.$this->session->flashdata('msg').'</b></p>'; ?>
					<p>Belum punya akun? Daftar <?php echo anchor('auth/register','di sini'); ?></p>
					<p>Lupa password? Reset <?php echo anchor('auth/reset','di sini'); ?></p>
				</form>
			</div>
		</div>
	</div>