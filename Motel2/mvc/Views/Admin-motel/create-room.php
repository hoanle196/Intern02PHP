<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Add room</h3>
  </div>
  <form action="?a=saveRoom" method="POST" enctype="multipart/form-data" class="formValidate">
    <div class="card-body">
      <div class="form-group">
        <label for="name">Room name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Room name">
      </div>

      <div class="form-group">
        <label for="acreage">Acreage(m2)</label>
        <input type="number" name="acreage" class="form-control" id="acreage" placeholder="acreage">
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" placeholder="price">
        <input type="hidden" name="user" value="<?php echo $_SESSION['login']['id'] ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="provinces">provinces</label>
        <select name="province" id="provinces" class="form-control">
          <option>Chọn tỉnh/ Thành phố</option>
          <option value="1">TP Hà nội</option>
          <option value="32">Đà Nẵng</option>
          <option value="50">TP Hồ Chí Minh</option>
        </select>
      </div>
      <div class="form-group">
        <label for="districts">Districts</label>
        <select name="district" id="districts" class="form-control">
          <option>select Districts</option>
        </select>
      </div>
      <div class="form-group">
        <label for="wards">Wards</label>
        <select name="ward" id="wards" class="form-control">
          <option>select wards</option>
        </select>
      </div>
      <div class="form-group">
        <label for="textarea">Description</label>
        <textarea class="form-control" id="textarea" name="description" rows="3"></textarea>
      </div>
      <?php foreach ($data as $key => $value) { ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="attribute[]" type="checkbox" id="<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>">
          <label class="form-check-label" for="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></label>
        </div>
      <?php } ?>
      <div class="form-group" id="uploadFile">
        <label for="uploadFile">Imgaes File</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="images[]" class="custom-file-input" accept=".jpg, .png, .svg" multiple required>
            <label class="custom-file-label" for="uploadFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>