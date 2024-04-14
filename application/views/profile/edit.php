<br>
<br>
<div class="container" ; style="background-color: #4caf50; width: 75%; height: 55%; border-radius: 10px; color: black;">
  <div class="card-body">
    <?php echo validation_errors(); ?>
    <?php echo form_open('profile/update'); ?>
    <form action="" style="margin: 0% 25%;">
      <h3 style="text-align: center;">Edit Profile</h3>


      <h5>Fullname</h5>
      <div class="form-group">
        <input type="text" name="fullname" class="form-control" value="<?= $akun['fullname']; ?>">
      </div>

      <h5>Username</h5>
      <div class="form-group">
        <input type="text" name="username" class="form-control" value="<?= $akun['username']; ?>">
      </div>

      <hr />

      <h3 style="text-align: center;">Edit Biodata</h3>

      <h5>Date of birth</h5>
      <div class="form-group">
        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $akun['tanggal_lahir']; ?>">
      </div>

      <h5>Gender</h5>
      <div>
        <input type="radio" id="" name="jenis_kelamin" value="Laki-laki">
        <label>Male</label>

        <input type="radio" id="" name="jenis_kelamin" value="Perempuan">
        <label>Female</label>
      </div>

      <h5> </h5>

      <div class="form-group" style="text-align: center;">
        <button class="btn btn-primary positon relative" style="background-color: #087f23; border-radius: 40px;
        border: 2px solid #666; width: 180px;" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>