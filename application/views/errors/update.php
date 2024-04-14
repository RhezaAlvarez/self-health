<br>
<br>

<?php echo validation_errors(); ?>
<div class="container"; style="background-color: #4caf50; width: 30%; height: 400px; border-radius: 10px;">
  <h3 style="text-align: center;">Pembaruan</h3>
  <div class="card-body" style="margin: 5% 10%">
    <hr>
    <hr>
    <?php echo form_open('users/update'); ?>
    <form>
      <h5>Tinggi Badan (cm)</h5>
      <div class="form-group">
        <input type="number" name="tinggi_badan" class="form-control" placeholder="" value="">
      </div>
      <h5>Berat Badan (kg)</h5>
      <div class="form-group">
        <input type="number" name="berat_badan" class="form-control" placeholder="" value="">
      </div>
  </div>
</div>

<div style="text-align: center; margin-top: 10px;">
<button class="btn btn-primary positon relative" style="background-color: #087f23; border-radius: 40px;
        border: 2px solid #666; width: 180px;" type="submit" >Submit</button>
</form>
</div>