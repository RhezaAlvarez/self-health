<div class="container" style="margin-top: 5%; background-color: #4caf50; width: 30%; height: 50%; border-radius: 20px; text-align: center; color: black;">
  <br>
  <br>
  <h5 style="text-transform: capitalize; text-align: center; "> <b><?= $akun['fullname']; ?></b></h5>
  <h5 style="text-align: center;"><?= $akun['tanggal_lahir']; ?></h5>
  <br>
  <div class="container" style="border-radius: 20px; width: 70%; background-color: white; padding-top: 10px; padding-bottom: 10px;">
    <h6 style="text-align: center;">Username</h6>
    <h5 style="text-transform: capitalize; text-align: center;"><b><?= $akun['username']; ?></b></h5>
    <hr>
    <h6 style="text-align: center;">Gender</h6>
    <h5 style="text-align: center;"><b>
    <?php
    if( $akun['jenis_kelamin'] == "Perempuan"): ?> Female <?php else: ?> Male <?php endif; ?>
    </b></h5>
    <hr>
    <h6 style="text-align: center;">Weight (kg)/Height (cm)</h6>
    <h5 style="text-align: center;"><b><?= $akun['berat_badan']; ?></b>/<b><?= $akun['tinggi_badan']; ?></b></h5>
  </div>
  <h2> </h2>

  <br>
  <div class="form-group" style="text-align: center;">
    <a href="<?= base_url(); ?>profile/edit" type="submit" name="" class="btn btn-danger positon relative" style="background-color: #087f23; border-radius: 40px; border: 2px solid #666; width: 40%;">Edit</a>
    <a href="<?= base_url(); ?>users/logout" type="submit" name="" class="btn btn-danger positon relative" style="border-radius: 40px; border: 2px solid #666; width: 40%;">Logout</a>
  </div>
</div>