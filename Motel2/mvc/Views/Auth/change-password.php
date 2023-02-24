<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Change Password</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Change to start your session</p>
      <form action="?c=authentication&a=changePasswordSubmit&id=<?php echo $_GET['id'] ?>" method="post" class="formValidate">
        <div class="mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
          <input type="password" name="passwordConfirm" class="form-control" placeholder="Retype password">
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Change</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>