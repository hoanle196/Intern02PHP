<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Register Form</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new customer</p>

      <form action="?c=login&a=register" method="post" class="formValidate">
        <div class="mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
        </div>
        <div class="mb-3">
          <input id="email" type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">

        </div>
        <div class="mb-3">
          <input type="password" name="passwordConfirm" class="form-control" placeholder="Retype password">
        </div>
        <div class="mb-3">
          <input type="text" name="address" class="form-control" placeholder="address">
        </div>
        <div class="mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Phone number">
          <input type="hidden" name="role" value="2">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="?c=login" class="text-center">I already have a customer</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>