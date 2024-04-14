<br>
<br>

<?php echo validation_errors(); ?>
<div class="container">
  <a href="<?= base_url('dashboard') ?>" class="btn mb-5"> <i class="fa fa-arrow-left"></i> <b>Dashboard</b></a>
  <h4 class="ml-2">Program Diet</h4>
  <p class="ml-2 lead">Rata-rata wanita memerlukan asupan sebanyak <b>2000</b> kalori per harinya, sedangkan pria rata-rata membutuhkan asupan sebanyak <b>2500</b> kalori per hari. Untuk menurunkan berat badan, idealnya Anda hanya perlu mengurangi <b>500</b> kalori setiap hari. Sehingga, wanita membutuhkan <b>1500</b> kalori dan pria membutuhkan <b>2000</b> kalori per hari untuk menurunkan berat badan. Dengan pengurangan <b>500</b> kalori per hari, Anda dapat kehilangan <b>0,5-1 kg</b> berat badan Anda per minggu.
    <br>
    <a href="https://hellosehat.com/nutrisi/berat-badan-turun/berapa-minimal-kalori-yang-harus-dipenuhi-saat-diet/">(Sumber: Hello Sehat)</a>
  </p>
  <br>
  <div class="row">
    <div class="col-xl-4 col-lg-7">
      <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Set Diet</h6>
        </div>
        <div class="card-body">
          <?php if ($akun['diet'] == "no") : ?>
            <form action="<?= base_url('users/insertDiet/'); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <h5>Turun (kg)</h5>
                  <input type="number" name="target" class="form-control" placeholder="" value="">
                  <button class="btn btn-primary mt-3" type="submit">Set</button>
            </form>
          <?php else: ?>
            <p class="lead"> Program diet anda <?= $kesehatan['persentase_pencapaian']; ?>% untuk mencapai target turun <?= $kesehatan['target']; ?> kg. </p>
            <p class="lead"> Deadline <?= $kesehatan['deadline']; ?></p>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $kesehatan['persentase_pencapaian']; ?></div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: <?= $kesehatan['persentase_pencapaian']; ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
            <form action="<?= base_url('users/unsetDiet/'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <button class="btn btn-primary mt-3" type="submit">Unset</button>
              </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>