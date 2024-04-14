<div class="container">
  <br>
  <a href="<?= base_url('dashboard') ?>" class="btn mb-5"> <i class="fa fa-arrow-left"></i> <b>Dashboard</b></a>

  <h4 class="ml-3">History</h4>
  <br>

  <div class="container-fluid">

    <a class="btn btn-primary" href="<?= base_url('dashboard/histori/makanan') ?>">Food</a>
    <a class="btn btn-danger" href="<?= base_url('dashboard/histori/olahraga') ?>">Sport</a>
    <br>
    <br>

    <?php if ($pilihan == "makanan") : ?>
      <table class="table table-striped table-hover table-bordered">
        <tr class="text-center">
          <th>NO</th>
          <th>Name</th>
          <th>Amount</th>
          <th>Total Calories</th>
          <th>Time</th>
        </tr>

        <?php

        $no = 1;
        foreach ($histori_m as $hm) :
        ?>

          <tr class="text-center">
            <td><?php echo $no++ ?></td>
            <td><?php echo $hm['food_name'] ?></td>
            <td><?php echo $hm['jumlah'] ?></td>
            <td><?php echo $hm['kalori_total'] ?></td>
            <?php $date = $hm['tanggal_sm'];
            $pieces = explode(" ", $date);
            ?>
            <td><?php echo $pieces[0]; ?></td>

          </tr>
        <?php endforeach; ?>
      </table>
    <?php elseif ($pilihan == "olahraga") : ?>
      <table class="table table-striped table-hover table-bordered">
        <tr class="text-center">
          <th>NO</th>
          <th>Name</th>
          <th>Amount</th>
          <th>Total Calories</th>
          <th>Time</th>
        </tr>

        <?php

        $no = 1;
        foreach ($histori_o as $ho) :
        ?>

          <tr class="text-center">
            <td><?php echo $no++ ?></td>
            <td><?php echo $ho['sport'] ?></td>
            <td><?php echo $ho['durasi'] ?></td>
            <td><?php echo $ho['pembakaran_kalori'] ?></td>
            <?php $date = $ho['tanggal_so'];
            $pieces = explode(" ", $date);
            ?>
            <td><?php echo $pieces[0]; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</div>