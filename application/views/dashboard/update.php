<br>
<br>

<?php echo validation_errors(); ?>
<div class="container">
  <a href="<?= base_url('dashboard') ?>" class="btn mb-5"> <i class="fa fa-arrow-left"></i> <b>Dashboard</b></a>
  <h4 class="ml-3">Update BMI</h4>
  <br>
  <div class="row">
    <div class="col-xl-6 col-lg-7">
      <div class="card shadow" style="padding-bottom: 95px;">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update</h6>
        </div>
        <div class="card-body">
          <?php echo form_open('users/update'); ?>
          <form>
            <h5>Height (cm)</h5>
            <div class="form-group">
              <input type="number" name="tinggi_badan" class="form-control" placeholder="" value="">
            </div>
            <h5>Weight (kg)</h5>
            <div class="form-group">
              <input type="number" name="berat_badan" class="form-control" placeholder="" value="">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-7">
      <div class="card shadow mb-2">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">History BMI</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myBMIchart"></canvas>
            <?php

            //Inisialisasi nilai variabel awal
            $time = "";
            $jumlah = null;
            foreach ($histori_bmi as $item) {
              $date = $item['tanggal'];
              $pieces = explode(" ", $date);
              $time .= "'$pieces[0]'" . ", ";

              // bmi
              $jum = $item['bmi'];
              $jumlah .= "$jum" . ", ";
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    var ctx = document.getElementById('myBMIchart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',
      // The data for our dataset
      data: {
        labels: [<?php echo $time; ?>],
        datasets: [{
          label: 'History BMI',
          backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
          borderColor: ['rgb(255, 99, 132)'],
          data: [<?php echo $jumlah; ?>]
        }]
      },
      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>