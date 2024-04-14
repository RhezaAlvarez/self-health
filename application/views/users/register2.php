<?php echo validation_errors(); ?>
<!-- Buka form  -->
<?php echo form_open('users/register'); ?>
<!-- Form dikirim ke controller users dan register function -->

<div class="container container-reg">
	<div class="card-body card-reg">
		<br>
		<h3 style="text-align: center;">Register Account</h3>

		<div class="form-group">
			<label for="">Fullname</label>
			<input type="text" name="fullname" class="form-control" placeholder="">
			<small class="form-text text-danger"><?= form_error('fullname'); ?></small>
		</div>

		<div class="form-group">
			<label for="">Username</label>
			<input type="text" name="username" class="form-control" placeholder="">
			<small class="form-text text-danger"><?= form_error('username'); ?></small>
		</div>

		<div class="form-group">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="">
			<small class="form-text text-danger"><?= form_error('password'); ?></small>
		</div>

		<div class="form-group">
			<label for="">Confirm Password</label>
			<input type="password" name="password2" class="form-control" placeholder="">
			<small class="form-text text-danger"><?= form_error('password2'); ?></small>
		</div>
		<hr />

		<h3 style="text-align: center;">Biodata</h3>

		<div class="form-group">
			<label for="">Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" class="form-control" placeholder="">
			<small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
		</div>

		<div class="form-group">
			<label for="">Tinggi Badan (cm)</label>
			<input type="number" name="tinggi_badan" class="form-control" placeholder="" value="">
			<small class="form-text text-danger"><?= form_error('tinggi_badan'); ?></small>
		</div>

		<div class="form-group">
			<label for="">Berat Badan (kg)</label>
			<input type="number" name="berat_badan" class="form-control" placeholder="" value="">
			<small class="form-text text-danger"><?= form_error('berat_badan'); ?></small>
		</div>

		<div>
			<label for="">Jenis Kelamin</label>
			<input type="radio" id="" name="jenis_kelamin" value="Laki">
			<label>Laki-laki</label>

			<input type="radio" id="" name="jenis_kelamin" value="Perempuan">
			<small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
			<label>Perempuan</label>
		</div>
	</div>
</div>
<br>

<div class="form-group" style="text-align: center;">
	<button type="submit" class="btn btn-primary relative positon reg">Register</button>
</div>

<?php echo form_close(); ?>