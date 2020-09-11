<?php
include 'header.php';

if (empty($_GET["nameurl"])) {
  header("Location: index.php");
  die();
}
$name = $_GET["nameurl"];
$nameurl = strtr($name, "_", " ");
$nameurl = strtoupper($nameurl);
$rproduct = $index->productall($nameurl);
?>
<style>
body {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  height: 100vh;
  font-family: 'Quicksand', sans-serif;
}

.product-slider {
  width: 1120px;
  margin: 0 auto;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
}

.product-slider__left {
  width: 33%;
  padding-top: 20px;
}

.product-slider__left li {
  text-align: center;
}

.product-slider__left li img {
  height: 500px;
  width: 300px;
  -o-object-fit: contain;
  object-fit: contain;
}

.product-slider__right {
  width: 66%;
}

.product-slider__right ul.products-nav {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  margin: 0;
}

.product-slider__right ul.products-nav .prev-slide {
  margin-right: 20px;
  cursor: pointer;
}

.product-slider__right ul.products-nav .next-slide {
  margin-left: 20px;
  cursor: pointer;
}

.product-slider__right ul.products-nav .slick-list {
  width: 100%;
}

.product-slider__right ul.products-nav li {
  cursor: pointer;
  text-align: center;
  opacity: .2;
  -webkit-transition: opacity 250ms;
  transition: opacity 250ms;
  -webkit-transition-delay: 600ms;
  transition-delay: 600ms;
  outline: none;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
}

.product-slider__right ul.products-nav li.slick-current {
  opacity: 1;
  -webkit-transition-delay: 0;
  transition-delay: 0;
}

.product-slider__right ul.products-nav li img {
  height: 150px;
  width: 100px;
  -o-object-fit: contain;
  object-fit: contain;
}

.product-slider__right ul.product-content {
  line-height: 1.5em;
  -webkit-user-select: auto;
  -moz-user-select: auto;
  -ms-user-select: auto;
  user-select: auto;
  margin: 0;
}

.product-slider__right ul.product-content h3 {
  font-size: 48px;
  letter-spacing: -.028em;
  line-height: 1.2em;
  margin-bottom: 10px;
  margin-top: 20px;
  font-weight: bold;
}

.product-slider__right ul.product-content p {
  margin-bottom: 2em;
}

.product-slider__right ul.product-content a {
  display: inline-block;
  padding: 8px 30px;
  text-decoration: none;
  font-family: "Open Sans", sans-serif;
  font-weight: 800;
  text-transform: uppercase;
  font-size: .8em;
  margin-right: 25px;
}

.product-slider__right ul.product-content a.light-btn {
  color: #333;
  border: 1px solid #333;
}

.product-slider__right ul.product-content a.dark-btn {
  color: #fff;
  background: #1ab35f;
  border: 1px solid #1ab35f;
}
</style>
<div class=" container product-slider">
  <ul class="product-slider__left slider-control">
    <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/single-use-packs.jpg"></li>
    <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/multi-use-ultrasound-gel-packs.jpg">
    </li>
    <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/high-viscosity-ultrasound-gel.jpg">
    </li>
    <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/acclimate-ultrasound-gel-warmer.jpg">
    </li>
  </ul>
  <div class="product-slider__right">
    <i class="prev-slide fas fa-chevron-left"></i>
    <ul class="products-nav">
      <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/single-use-packs.jpg"></li>
      <li><img
          src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/multi-use-ultrasound-gel-packs.jpg">
      </li>
      <li><img src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/high-viscosity-ultrasound-gel.jpg">
      </li>
      <li><img
          src="http://dev.webdesignofyork.com/ecovue/wp-content/uploads/2020/08/acclimate-ultrasound-gel-warmer.jpg">
      </li>
    </ul>
    <i class="next-slide fas fa-chevron-right"></i>

    <ul class="product-content slider-control">

    </ul>
  </div>
</div>

<?php include 'footer.php' ?>
<title>Almacén Luisxv</title>