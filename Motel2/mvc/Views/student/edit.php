<h1>Edit student</h1>
<form action="?a=save&id=<?= isset($data[0]) ? $data[0]['student_id'] : '' ?>" method="POST" name="frm1" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" value="<?= isset($data[0]) ? $data[0]['student_name'] : '' ?>" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">date of birth</label>
    <input type="date" value="<?= isset($data[0]) ? $data[0]['student_birthday'] : '' ?>" class="form-control" id="date" name="date">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">address</label>
    <input type="text" value="<?= isset($data[0]) ? $data[0]['student_address'] : '' ?>" class="form-control" id="address" name="address">
  </div>
  <div class="mb-3 uploadfile">
    <span id="text">upload File</span>
    <input id="uploadfile" type="file" name="avatar[]" accept=".jpg, .png, .svg" multiple required>
  </div>
  <?php if (isset($img)) :
    foreach ($img as $value) :
  ?>
      <img src="./public/uploads/<?= isset($value['image_path']) ? $value['image_path'] : ''  ?>" class="image" alt="">
    <?php endforeach ?>
  <?php endif ?>


  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>