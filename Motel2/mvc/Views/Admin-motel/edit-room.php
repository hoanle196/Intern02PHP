<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Add room</h3>
  </div>
  <form action="?a=updateRoom&id=<?php echo $data[0]['id'] ?>" method="POST" enctype="multipart/form-data" class="formValidate">
    <div class="card-body">
      <div class="form-group">
        <label for="name">Room name</label>
        <input type="text" value="<?php echo $data[0]['name'] ?>" name="name" class="form-control" id="name" placeholder="Room name">
      </div>

      <div class="form-group">
        <label for="acreage">Acreage(m2)</label>
        <input type="number" value="<?php echo $data[0]['acreage'] ?>" name="acreage" class="form-control" id="acreage" placeholder="acreage">
      </div>

      <div class="form-group">
        <label for="address">Price</label>
        <input type="number" value="<?php echo $data[0]['price'] ?>" name="price" class="form-control" id="address" placeholder="address">
      </div>

      <div class="form-group">
        <label for="provinces">provinces</label>
        <select name="province" id="provinces" class="form-control">
          <option>Chọn tỉnh/ Thành phố</option>
          <option selected value="<?php echo $data[0]['province_id'] ?>"><?php echo $data[0]['province'] ?></option>
        </select>
      </div>
      <div class="form-group">
        <label for="districts">Districts</label>
        <select name="district" id="districts" class="form-control">
          <option>select Districts</option>
          <option selected value="<?php echo $data[0]['district_id'] ?>"><?php echo $data[0]['district'] ?></option>


        </select>
      </div>
      <div class="form-group">
        <label for="wards">Wards</label>
        <select name="ward" id="wards" class="form-control">
          <option>select wards</option>
          <option selected value="<?php echo $data[0]['ward_id'] ?>"><?php echo $data[0]['ward'] ?></option>

        </select>
      </div>
      <div class="form-group">
        <label for="textarea">Description</label>
        <textarea class="form-control" id="textarea" name="description" rows="3"><?php echo $data[0]['description'] ?></textarea>
      </div>
      <?php foreach ($attr as $key => $value) { ?>
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
      <?php if (isset($image)) :
        foreach ($image as $value) :
      ?>
          <img src="./public/uploads/<?php echo  isset($value['path']) ? $value['path'] : ''  ?>" class="images" alt="">
        <?php endforeach ?>
      <?php endif ?>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>