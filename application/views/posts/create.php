<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
<form>
  <div class="form-group">
  	<label>Title</label>
    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
    <input type=text class="form-control" name="title" placeholder="Add Title">
  </div>

  <div class="form-group">
  	<label>Body</label>
    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
    <textarea id="editor1"  class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Upload Image</label><br>
    <input type="file" name="userfile" size="20">
  </div>



<button type="Submit" class="btn btn-primary">Submit</button>

    <!-- <input type="file" class="form-control-file" id="exampleFormControlFile1"> -->
</form>