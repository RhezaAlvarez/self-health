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
		</div>

		<div class="form-group">
			<label for="">Username</label>
			<input type="text" name="username" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label for="">Confirm Password</label>
			<input type="password" name="password2" class="form-control" placeholder="">
		</div>
		<hr />

		<h3 style="text-align: center;">Biodata</h3>

		<div class="form-group">
			<label for="">Date of birth</label>
			<input type="date" name="tanggal_lahir" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label for="">Height (cm)</label>
			<input type="number" name="tinggi_badan" class="form-control" placeholder="" value="">
		</div>

		<div class="form-group">
			<label for="">Weight (kg)</label>
			<input type="number" name="berat_badan" class="form-control" placeholder="" value="">
		</div>

		<div>
			<label for="">Gender</label>
			<input type="radio" id="" name="jenis_kelamin" value="Laki-laki">
			<label>Male</label>

			<input type="radio" id="" name="jenis_kelamin" value="Perempuan">
			<label>Female</label>
		</div>
	</div>
</div>
<br>

<div class="form-group" style="text-align: center;">
	<button type="submit" class="btn relative positon reg">Register</button>
</div>

<?php echo form_close(); ?>