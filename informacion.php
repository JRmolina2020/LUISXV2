<?php include 'header.php';
$rbanner = $index->banner();
?>
<style>
shop {
  position: relative;
  overflow: hidden;
  margin: 15px 0px;
}

.shop:before {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0px;
  width: 60%;
  background: #000;
  opacity: 0.9;
  -webkit-transform: skewX(-45deg);
  -ms-transform: skewX(-45deg);
  transform: skewX(-45deg);
}

.shop:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 1px;
  width: 100%;
  background: #000;
  opacity: 0.9;
  -webkit-transform: skewX(-45deg) translateX(-100%);
  -ms-transform: skewX(-45deg) translateX(-100%);
  transform: skewX(-45deg) translateX(-100%);
}

.shop .shop-img {
  position: relative;
  background-color: #e4e7ed;
  z-index: -1;
}

.shop .shop-img>img {
  width: 100%;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.shop:hover .shop-img>img {
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}

.shop .shop-body {
  position: absolute;
  top: 0;
  width: 75%;
  padding: 30px;
  z-index: 10;
}

.shop .shop-body h3 {
  color: #fff;
}

.shop .shop-body .cta-btn {
  color: #fff;
  text-transform: uppercase;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="">
        <div class="shop">
          <div class="shop-img">
            <img width='230' height='160'
              src='https://1.bp.blogspot.com/-45wF3jvGiJc/XWoeZfYjvpI/AAAAAAAAEuo/4bVhTqZ2UBMgKF8VSnzr8lXKiODD8B9QQCLcBGAs/s640/new.gif'>
          </div>
          <div class="shop-body">
            <h3>Celulares</h3>
            <a href="" class="cta-btn">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="">
        <div class="shop">
          <div class="shop-img">
            <img width='230' height='160'
              src='https://cloudfront-us-east-1.images.arcpublishing.com/grupoclarin/GQ4DKNJUMM2TSZBXGRRWEOBWMI.gif'>
          </div>
          <div class="shop-body">
            <h3>Portátiles</h3>
            <a href="" class="cta-btn">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="">
        <div class="shop">
          <div class="shop-img">
            <img width='230' height='160'
              src='https://9to5google.com/wp-content/uploads/sites/4/2020/05/tivo_stream_4k_live_tv_1.gif'>
          </div>
          <div class="shop-body">
            <h3>TV</h3>
            <a href="" class="cta-btn">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="">
        <div class="shop">
          <div class="shop-img">
            <img width='230' height='160' src='https://data.whicdn.com/images/27106448/original.gif'>
          </div>
          <div class="shop-body">
            <h3>AUDIO</h3>
            <a href="" class="cta-btn">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>
<?php include 'footer.php' ?>
<title>Información - Almacén luisxv</title>