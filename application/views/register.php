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
						<label for="email">Email / Username</label>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" onblur="if (document.getElementById('password2').value!='') (this.value==document.getElementById('password2').value)?document.getElementById('password2').setCustomValidity(''):document.getElementById('password2').setCustomValidity('New password do not match.')" required>
					</div>
					<div class="form-group">
						<label for="password2">Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2" id="password2" onblur="(this.value==document.getElementById('password').value)?this.setCustomValidity(''):this.setCustomValidity('New password do not match.')" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Daftar</button><br>
					<?php if ($this->session->flashdata('msg')!='') echo '<p style="text-align:center;"><b>'.$this->session->flashdata('msg').'</b></p>'; ?>
					<p>Sudah punya akun? Login <?php echo anchor('auth','di sini'); ?></p>
				</form>
			</div>
		</div>
	</div>