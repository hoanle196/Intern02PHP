<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Forgot Password</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Send email get link password</p>
      <form action="?c=authentication&a=sendEmail" method="post" class="formValidate">
        <div class=" mb-3">
          <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                    echo $email;
                                                  } ?>" class="form-control" placeholder="Email">
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>