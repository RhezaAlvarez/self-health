<?php echo validation_errors(); ?>
<!-- Buka form  -->
<?php echo form_open('users/login'); ?>
<!-- Form dikirim ke controller users dan login function -->

<br>
<br>

<div class="container" style="text-align: center;">
<!-- FLASH MESSAGE -->
<?php if ($this->session->flashdata('login_failed')) : ?>
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('login_failed'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
<?php endif; ?>

</div>

<div class="container container-log">
	<br>
	<br>
	<h3 style="text-align: center;" class="pt-2">Log In</h3>
	<div class="card-body">
		<h5>Username</h5>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
		</div>
		<br>
		<h5>Password</h5>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
		</div>
	</div>
</div>
<br>
<div class="form-group" style="text-align: center;">
	<button type="submit" class="btn btn-block reg">Login</button>
</div>

<!-- Tutup Form -->
<?php echo form_close(); ?>