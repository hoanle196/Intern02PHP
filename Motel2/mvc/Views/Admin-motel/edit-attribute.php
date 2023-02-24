<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">add Attribute</h3>
  </div>
  <form action="?a=updateAttr&id=<?php echo $_GET['id'] ?>" method="POST" class="formValidate">
    <div class="card-body">
      <div class="form-group">
        <label for="name">Attribute name</label>
        <input type="text" name="name" value="<?php echo isset($result) ? $result[0]['name'] : "" ?>" class="form-control" id="name" placeholder="eg: ti vi, dieu hoa, nong lanh ...">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>