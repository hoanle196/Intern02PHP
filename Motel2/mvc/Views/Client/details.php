<?php $imgPaths = explode(',', $data[0]['paths']);
echo "
<script>
  var dataBooking = " . json_encode($bookings) . "
</script>";
?>


<main>
  <section class="image-head-wrapper" style="background-image: url('./public/uploads/<?php echo $imgPaths[0] ?>');">
    <div class="inner-wrapper">
      <!-- <button class="add-to-cart">Booking Now</button> -->

    </div>
  </section>

</main>
<div class="clearfix"></div>

<!--gallery block--->
<section class="gallery-block gallery-front">
  <div class="container">
    <div class="row">
      <?php foreach ($imgPaths as $path) { ?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="gallery-image">
            <img class="img-responsive" src="./public/uploads/<?php echo $path ?>">
            <div class="overlay">
              <a class="info pop example-image-link img-responsive" href="./public/uploads/<?php echo $path ?>" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<div class="container">
  <div class="grid product">
    <!-- <button class="add-to-cart">Booking Now</button> -->
    <div class="col-md-12  col-sm-12 col-xs-12  tfo-pd0">
      <h1 class="title"><?php echo "{$data[0]['name']} - {$data[0]['ward']}, {$data[0]['district']}, {$data[0]['province']} " ?></h1>
      <h2>Price: $<?php echo $data[0]['price'] ?></h2>
      <h3>Description:</h3>
      <div class="description-details">
        <p><?php echo $data[0]['description'] ?></p>
      </div>
      <h3>Service:</h3>
      <div class="attribute">
        <?php foreach ($attr as $value) { ?>
          <ul>
            <li>- <?php echo $value['name'] ?></li>
          </ul>
        <?php } ?>
      </div>
      <h3>Posted by: <i><?php echo $infoUserPost[0]['name'] ?></i></h3>


      <form action="?a=booking&id=<?php echo $data['0']['id'] ?>" method="POST">
        <!-- <form action="?a=order&id=<?php echo $data['0']['id'] ?>" method="POST"> -->
        <div class="mb-3">
          <label for="start">Start date :</label>
          <input type="text" id="start" class="daterange form-control" name="start">
        </div>
        <div class="mb-3">
          <label for="end">End date :</label>
          <input type="text" id="end" class="daterange form-control" name="end">
        </div>
        <!-- <div class="text-left"><button type="submit" class="book-now-btn">Book Now</button></div> -->
        <!-- </form> -->
        <div class="text-left"><button type="submit" class="book-now-btn">Booking Now</button></div>
      </form>
    </div>
  </div>
</div>
<!--service block--->
<section class="service-block">
  <div class="bg-set-col">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6 width-50">
          <div class="service-details text-center">
            <div class="service-image">
              <img alt="image" class="img-responsive" src="./public/temp/client/images/icons/wifi.png">
            </div>
            <h4><a>free wifi</a></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 width-50">
          <div class="service-details text-center">
            <div class="service-image">
              <img alt="image" class="img-responsive" src="./public/temp/client/images/icons/key.png">
            </div>
            <h4><a>room service</a></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 mt-25">
          <div class="service-details text-center">
            <div class="service-image">
              <img alt="image" class="img-responsive" src="./public/temp/client/images/icons/car.png">
            </div>
            <h4><a>free parking</a></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 mt-25">
          <div class="service-details text-center">
            <div class="service-image">
              <img alt="image" class="img-responsive" src="./public/temp/client/images/icons/user.png">
            </div>
            <h4><a>customer support</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>