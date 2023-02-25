<!--end-->
<?php $totalPrice = ($data[0]['price'] * round(abs(strtotime($_POST['end']) - strtotime($_POST['start'])) / 86400)) ?>


<section class="image-head-wrapper" style="background-image: url('./public/temp/client/images/banner4.jpg');">
  <div class="inner-wrapper">
    <h1>Contact Us</h1>
  </div>
</section>
<div class="clearfix"></div>
<section class="contact-block">
  <div class="container">
    <div class="col-md-6 contact-left-block">
      <h3><span>Room </span>Information</h3>
      <p class="text-left"> <?php echo $data[0]['description'] ?></p>
      <p class="text-right"><?php echo "{$data[0]['ward']}, {$data[0]['district']}, {$data[0]['province']} " ?> <i class="fa fa-map-marker fa-lg"></i></p>
      <p class="text-right"><a href="tel:<?php echo $infoUserPost[0]['phone'] ?>"> <?php echo $infoUserPost[0]['phone'] ?><i class="fa fa-phone fa-lg"></i></a></p>
      <p class="text-right"><a>$ <?php echo $totalPrice ?> <i class="fa fa-envelope"></i></a></p>
    </div>
    <div class="col-md-6 contact-form">
      <h3><span>User </span>Information</h3>
      <input type="text" class="form-control" value="<?php echo $_SESSION['login']['name'] ?>" name="Name" disabled placeholder="Name" required="">
      <input type="email" class="form-control" value="<?php echo $_SESSION['login']['email'] ?>" name="Email" disabled placeholder="Email" required="">
      <input type="text" class="form-control" value="<?php echo $_SESSION['login']['address'] ?>" name="Name" disabled placeholder="Name" required="">
      <input type="text" class="form-control" value="<?php echo $_SESSION['login']['phone'] ?>" name="Email" disabled placeholder="Email" required="">
      <form action="?a=order&id=<?php echo $_GET['id'] ?>" method="POST">
        <input type="hidden" value="<?php echo $totalPrice ?> " name="price">
        <input type="hidden" value="<?php echo $bookingId ?> " name="bookingId">
        <div class="text-left"><button type="submit" class="book-now-btn">Order Now</button></div>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</section>

<!---map--->
<section class="offspace-70">
  <div class="map">
    <div class="container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101257.12284776446!2d-77.56330202084071!3d37.52477641775529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b111095799c9ed%3A0xbfd83e6de2423cc5!2sRichmond%2C+VA%2C+USA!5e0!3m2!1sen!2sin!4v1488891294599" frameborder="0" style="border:0; width: 100%; height: 400px" allowfullscreen></iframe>
    </div>
  </div>
</section>
<!---footer--->