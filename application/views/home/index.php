<div class="container" style="color: black;">
  <br>
  <div class="textBoxHome">
    <h4>
      Welcome back <b><span style="text-transform:capitalize"> <?= $akun['fullname']; ?> </span> </b>,
    </h4>
    <h4>
      The purpose of this application is to improve your health by monitoring your diet, sports activities that match your body's needs.
      This application can display <b> DASHBOARD </b> to show your health performance
      to monitor and know your productivity.
      Stay healthy!
    </h4>
    <hr>
  </div>
  <?php
  if ($magTaste['taste']) :
  ?>
    <div class="card">
      <div class="card-header">
        Food Recommendations
      </div>
      <div class="card-body">
        <!-- <h5 class="card-title"></h5>
        <p class="card-text">
        <p>Menu</p> -->
        <?php
        $no = 1;
        foreach ($fav as $f) :
          if ($no <= 10) :
            if ($f['cuisene'] == $magCuisene['cuisene']) :
              echo $no++ . ". " . $f['food_name'] . " (" . $f['calories'] . " kalori)"; ?>
              <br>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
    <br>
  <?php endif; ?>

  <?php
  if ($magInten['intensitas']) :
  ?>
    <div class="card">
      <div class="card-header">
        Sport Recommendations
      </div>
      <div class="card-body">
        <!-- <h5 class="card-title"></h5>
        <p class="card-text">
        </p> -->
        <?php
        $no = 1;
        foreach ($fav2 as $f2) :
          if ($no <= 10) :
            if ($f2['tools'] == $magTools['tools']) :

              $weight = $akun['berat_badan'];

              if ($weight <= 59) {
                $calories_hour = $f2['sixty'];
              } else if ($weight > 59 && $weight <= 70) {
                $calories_hour = $f2['seventy'];
              } else if ($weight > 70 && $weight <= 82) {
                $calories_hour = $f2['eighty'];
              } else {
                $calories_hour = $f2['ninety'];
              }

              echo $no++ . ". " . $f2['sport'] . " (" . $calories_hour . " kalori)"; ?>
              <br>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  <?php endif; ?>
</div>