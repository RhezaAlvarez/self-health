<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h5>Add Food Data</h5>
      <hr>
      <?php echo validation_errors(); ?>
      <form method="post" action="<?= base_url('admin/insertFood') ?>">
        <div class="form-group">
          <label class="mt-2">Name</label>
          <input type="text" name="food_name" class="form-control">
        </div>
        <div class="form-group">
          <label class="mt-2">Calories</label>
          <input type="number" name="calories" class="form-control">
        </div>
        <div class="form-group">
          <label class="mt-2">Taste</label>
          <select class="form-control" name="taste">
            <option value="Bitter">Bitter</option>
            <option value="Sweets">Sweets</option>
            <option value="Salty">Salty</option>
            <option value="Sour">Sour</option>
            <option value="Salty">Salty</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mt-2">Cuisene</label>
          <select class="form-control" name="cuisene">
            <option value="Pasta">Pasta</option>
            <option value="Fast Food">Fast Food</option>
            <option value="Fruits">Fruits</option>
            <option value="Vegetables">Vegetables</option>
            <option value="Oil">Oil</option>
            <option value="Western">Western</option>
            <option value="Seafood">Seafood</option>
            <option value="Pizza">Pizza</option>
            <option value="Soups">Soups</option>
            <option value="Noodles">Noodles</option>
            <option value="Chicken">Chicken</option>
            <option value="Snacks">Snacks</option>
            <option value="Rice">Rice</option>
            <option value="Mexican">Mexican</option>
            <option value="Indian">Indian</option>
            <option value="Rice">Rice</option>
            <option value="Middle Eastern">Middle Eastern</option>
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    </div>
    <div class="col-md-6">
      <h5>Add sport data</h5>
      <hr>
      <?php echo validation_errors(); ?>
      <form method="post" action="<?= base_url('admin/insertSport') ?>">
        <div class="form-group">
          <label class="mt-2">Name</label>
          <input type="text" name="sport" class="form-control">
        </div>
        <div class="form-group">
          <label class="mt-2">Calories</label>
          <input type="number" name="calories" class="form-control">
        </div>
        <div class="form-group">
          <label class="mt-2">Intensity</label>
          <select class="form-control" name="intensitas">
            <option value="heavy">Heavy</option>
            <option value="light">Light</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mt-2">Tools</label>
          <select class="form-control" name="tools">
            <option value="yes">Need</option>
            <option value="no">No Need</option>
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    </div>
  </div>
</div>