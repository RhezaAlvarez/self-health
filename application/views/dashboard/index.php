<br>
<br>
<div class="container">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-0 text-gray-800 mt-1">Dashboard</h1> -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
      <a href="<?= base_url('dashboard/update/'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-5">Update BMI</a>
      <a href="<?= base_url('dashboard/histori/'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"><i class="fas fa-download fa-sm text-white-50"></i> History </a>
      <a href="<?= base_url('dashboard/diet/'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"> Diet </a>
    </div>
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  BMI</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo round($bmi->bmi, 2); ?>
                </div>
              </div>
              <div class="col-auto">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">AVERAGE OF INDONESIAN BMI</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                  if ($akun['jenis_kelamin'] == "Perempuan") {
                    echo "22.7";
                  } else {
                    echo 21;
                  }
                  ?>
                </div>
              </div>
              <div class="col-auto">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">your bmi category
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      <?php
                      if ($akun['jenis_kelamin'] == "Perempuan") {
                        if ($bmi->bmi < 18) {
                          echo "Underweight";
                        } else if ($bmi->bmi > 18 && $bmi->bmi < 25) {
                          echo "Normal";
                        } else if ($bmi->bmi > 25 && $bmi->bmi < 27) {
                          echo "Overweight";
                        } else {
                          echo "Obese";
                        }
                      } else {
                        if ($bmi->bmi < 17) {
                          echo "Underweight";
                        } else if ($bmi->bmi > 17 && $bmi->bmi < 23) {
                          echo "Normal";
                        } else if ($bmi->bmi > 23 && $bmi->bmi < 27) {
                          echo "Overweight";
                        } else {
                          echo "Obese";
                        }
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  calorie needs on this day</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo $kebutuhan; ?>
                </div>
              </div>
              <div class="col-auto">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Food History</h6>
            <div class="dropdown no-arrow">
              <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a> -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myChart"></canvas>
              <?php

              //Inisialisasi nilai variabel awal
              $time = "";
              $jumlah = null;
              foreach ($histori_m as $item) {
                $date = $item['tanggal_sm'];
                $pieces = explode(" ", $date);
                $time .= "'$pieces[0]'" . ", ";

                // Kalori
                $jum = $item['kalori_total'];
                $jumlah .= "$jum" . ", ";
              }
              ?>

            </div>
          </div>
        </div>
      </div>
      <!-- Area Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sport History</h6>
            <div class="dropdown no-arrow">

            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myChart2"></canvas>
              <?php

              //Inisialisasi nilai variabel awal
              $time2 = "";
              $jumlah2 = null;
              foreach ($histori_o as $item2) {
                $date2 = $item2['tanggal_so'];
                $pieces2 = explode(" ", $date2);
                $time2 .= "'$pieces2[0]'" . ", ";

                // Kalori
                $jum2 = $item2['pembakaran_kalori'];
                $jumlah2 .= "$jum2" . ", ";
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Makanan -->
      <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Food</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="small">
              <form action="<?= base_url('dashboard/create_food/'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group" id="prefetch">
                  <label>Name</label>
                  <input type="text" name="food" class="form-control typeahead" placeholder="Search Here" style="margin-left: 14px;" required autofocus>
                </div>
                <div class="form-inline">
                  <label>Portion</label>
                  <input type="number" name="portion" class="form-control" style="margin-left: 10px; width: 100px;" required autofocus>
                </div>
                <button onclick="addData()" type=" submit" class="btn btn-primary mt-2" name="save">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Olahraga -->
      <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sport</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="small">
              <form action="<?= base_url('dashboard/create_sport/'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group" id="prefetch2">
                  <label>Name</label>
                  <input type="text" name="sport" class="form-control typeahead2" style="margin-left: 67px;" placeholder="Search Here" required autofocus>
                </div>
                <div class="form-inline">
                  <label>Duration (minutes)</label>
                  <input type="number" name="duration" class="form-control" style="margin-left: 10px; width: 100px;" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary mt-2" name="save">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>


<script>
  $(document).ready(function() {
    var sample_data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: '<?= base_url(); ?>autocomplete/fetch',
      remote: {
        url: '<?= base_url(); ?>autocomplete/fetch/%QUERY',
        wildcard: '%QUERY'
      }
    });


    $('#prefetch .typeahead').typeahead(null, {
      name: 'sample_data',
      display: 'name',
      source: sample_data,
      limit: 10,
      templates: {
        suggestion: Handlebars.compile('<div style="padding-right:5px; padding-left:5px; background-color: #000;">{{name}}</div>')
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sample_data2 = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch2: '<?= base_url(); ?>autocomplete/fetch2',
      remote: {
        url: '<?= base_url(); ?>autocomplete/fetch2/%QUERY',
        wildcard: '%QUERY'
      }
    });


    $('#prefetch2 .typeahead2').typeahead(null, {
      name: 'sample_data2',
      display: 'name',
      source: sample_data2,
      limit: 10,
      templates: {
        suggestion: Handlebars.compile('<div style="padding-right:5px; padding-left:5px; background-color: #000;">{{name}}</div>')
      }
    });
  });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php echo $time; ?>],
      datasets: [{
        label: 'Food History',
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
<script>
  var ctx2 = document.getElementById('myChart2').getContext('2d');
  var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php echo $time2; ?>],
      datasets: [{
        label: 'Sport History',
        backgroundColor: ['rgb(0, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
        borderColor: ['rgb(0, 99, 132)'],
        data: [<?php echo $jumlah2; ?>]
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