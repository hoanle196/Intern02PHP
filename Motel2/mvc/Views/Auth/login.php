<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="?c=login&a=store" method="post" class="formValidate">
        <div class=" mb-3">
          <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                    echo $email;
                                                  } ?>" class="form-control" placeholder="Email">
        </div>
        <div class=" mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="check" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      <p class="mb-1">
        <a href="?a=forgotPassword">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="?a=createAdmin" class="text-center">Register a new admin</a>
      </p>
      <p class="mb-0">
        <a href="?a=createCustomer" class="text-center">Register a new customer</a>
      </p>
    </div>
  </div>
</div>