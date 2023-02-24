<h1>Add student</h1>
<form action="?a=store" method="POST" name="frm1" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">date of birth</label>
    <input type="date" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>" class="form-control" id="date" name="date">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">address</label>
    <input type="text" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control" id="address" name="address">
  </div>
  <div class="mb-3 uploadfile">
    <span id="text">upload File</span>
    <input id="uploadfile" type="file" name="avatar[]" accept=".jpg, .png, .svg" multiple required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>