<style>
  .product-desc-side {
    position: relative;
  }
</style>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
  <!-- Indicators
  <?php // var_dump($data);
  // var_dump($attr) 
  ?> -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel1" data-slide-to="1"></li>
    <li data-target="#myCarousel1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="./public/temp/client/images/banner.png" style="width:100%; height: 500px" alt="First slide">
      <div class="carousel-caption">
        <h1>Motel<br> Hà nội</h1>
      </div>
    </div>
    <div class="item"> <img src="./public/temp/client/images/banner2.png" style="width:100%; height: 500px" alt="Second slide">
      <div class="carousel-caption">
        <h1>Motel<br> Đà Nẵng</h1>
      </div>
    </div>
    <div class="item"> <img src="./public/temp/client/images/banner3.png" style="width:100%; height: 500px" alt="Third slide">
      <div class="carousel-caption">
        <h1>Motel<br> Thành Phố Hồ Chí Minh</h1>
      </div>
    </div>

  </div>
  <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <img src="./public/temp/client/images/icons/left-arrow.png" onmouseover="this.src = './public/temp/client/images/icons/left-arrow-hover.png'" onmouseout="this.src = './public/temp/client/images/icons/left-arrow.png'" alt="left"></a>
  <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="./public/temp/client/images/icons/right-arrow.png" onmouseover="this.src = './public/temp/client/images/icons/right-arrow-hover.png'" onmouseout="this.src = './public/temp/client/images/icons/right-arrow.png'" alt="left"></a>

</div>
<div class="clearfix"></div>

<!--service block--->
<section class="service-block">
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
</section>

<!--gallery block--->


<!----resort-overview--->
<section class="resort-overview-block">

  <div class="container">
    <!-- <form action="" class="formValidate" style="padding: 10px;">
      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
      <select class="form-control rounded" id="inputGroupSelect01">
        <option >Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <button type="button" class="btn btn-outline-primary">search</button>

    </form> -->
    <form action="?a=index" method="GET" class="formValidate" style="padding:10px;">
      <div class="form-row">
        <div class="col-4">
          <input type="search" name="name" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
        <div class="col">
          <select name="province" class="custom-select my-1 mr-sm-2" id="provinces">
            <option>Province</option>
            <option value="1">TP Hà nội</option>
            <option value="32">Đà Nẵng</option>
            <option value="50">TP Hồ Chí Minh</option>
          </select>

        </div>
        <div class="col">
          <select name="district" class="custom-select my-1 mr-sm-2" id="districts">
            <option>district</option>
          </select>
        </div>
        <div class="col">
          <select name="ward" class="custom-select my-1 mr-sm-2" id="wards">
            <option>ward</option>
          </select>
        </div>

        <div class="col">
          <select name="price" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option>price</option>
            <option value="100">
              < 1 triệu</option>
            <option value="200">
              < 2 triệu</option>
            <option value="500">
              < 5 triệu</option>
          </select>
        </div>
        <button type="submit" name="searchSubmit" class="btn btn-outline-primary">Filter</button>
      </div>
    </form>
    <?php if ($data) : ?>
      <div class="row result">
        <?php
        foreach ($data as $key => $value) :
          $image = explode(',', $value['paths']);
        ?>
          <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right">
            <div class="side-A">
              <div class="product-thumb">
                <div class="image">
                  <a><img src="./public/uploads/<?php echo $image[0] ?>" class="img-responsive tfo-image" alt="image"></a>
                </div>
              </div>
            </div>
            <div class="side-B">
              <div class="product-desc-side">
                <h3><a><?php echo $value['name'] ?></a></h3>
                <p class="description"><?php echo $value['description'] ?>.</p>
                <div class="links"><a href="?a=detailRoom&id=<?php echo $value['id'] ?>">Read more</a></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="row result"></div>
      <h1>Không tìm thấy kết quả nào trùng khớp !</h1>
  </div>
<?php endif; ?>
</div>
</section>
<section class="gallery-block gallery-front">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="gallery-image">
          <img class="img-responsive" src="./public/temp/client/images/room1.png">
          <div class="overlay">
            <a class="info pop example-image-link img-responsive" href="./public/temp/client/images/room1.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
            <p><a>delux room</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="gallery-image">
          <img class="img-responsive" src="./public/temp/client/images/room2.png">
          <div class="overlay">
            <a class="info pop example-image-link img-responsive" href="./public/temp/client/images/room2.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
            <p><a>super room</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="gallery-image">
          <img class="img-responsive" src="./public/temp/client/images/room3.png">
          <div class="overlay">
            <a class="info pop example-image-link img-responsive" href="./public/temp/client/images/room3.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
            <p><a>single room</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="gallery-image">
          <img class="img-responsive" src="./public/temp/client/images/room4.png">
          <div class="overlay">
            <a class="info pop example-image-link img-responsive" href="./public/temp/client/images/room4.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
            <p><a>double room</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--offer block-->
<section class="vacation-offer-block">
  <div class="vacation-offer-bgbanner">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
          <div class="vacation-offer-details">
            <h1>Your vacation Awaits</h1>
            <h4>Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit.</h4>
            <button type="button" class="btn btn-default">Choose a package</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End-->

<!-----blog slider----->
<!--blog trainer block-->
<section class="blog-block-slider">
  <div class="blog-block-slider-fix-image">
    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
      <div class="container">
        <!-- Wrapper for slides -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel2" data-slide-to="1"></li>
          <li data-target="#myCarousel2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <div class="blog-box">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
            </div>
            <div class="blog-view-box">
              <div class="media">
                <div class="media-left">
                  <img src="./public/temp/client/images/client1.png" class="media-object">
                </div>
                <div class="media-body">
                  <h3 class="media-heading blog-title">Walter Hucko</h3>
                  <h5 class="blog-rev">Satisfied Customer</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="blog-box">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
            </div>
            <div class="blog-view-box">
              <div class="media">
                <div class="media-left">
                  <img src="./public/temp/client/images/client2.png" class="media-object">
                </div>
                <div class="media-body">
                  <h3 class="media-heading blog-title">Jules Boutin</h3>
                  <h5 class="blog-rev">Satisfied Customer</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="blog-box">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
            </div>
            <div class="blog-view-box">
              <div class="media">
                <div class="media-left">
                  <img src="./public/temp/client/images/client3.png" class="media-object">
                </div>
                <div class="media-body">
                  <h3 class="media-heading blog-title">Attilio Marzi</h3>
                  <h5 class="blog-rev">Satisfied Customer</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>

<!---blog block--->
<section class="blog-block">
  <div class="container">
    <div class="row offspace-45">
      <div class="view-set-block">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="event-blog-image">
            <img alt="image" class="img-responsive" src="./public/temp/client/images/blog1.png">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
          <div class="event-blog-details">
            <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
            <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
            <a class="btn btn-default" href="single-blog.html">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row offspace-45">
      <div class="view-set-block">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="event-blog-image">
            <img alt="image" class="img-responsive" src="./public/temp/client/images/blog2.png">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
          <div class="event-blog-details">
            <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
            <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
            <a class="btn btn-default" href="single-blog.html">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>