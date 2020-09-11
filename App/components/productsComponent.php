<div class="section">
  <div class="container">
    <div class="row">
      <?php
      while ($row = $rproduct->fetch_object()) {
        $id = $row->id;
        $ref = $row->ref;
        $name = $row->product;
        $categorie = $row->categorie;
        $categorie = strtolower($categorie);
        $nameurl = strtr($name, " ", "_");
        $nameurl = strtolower($nameurl);
        $brand = $row->brand;
        $description = $row->description;
        $price = number_format($row->price, 0, '', '.');
        $price_ac = $row->price * $row->discount;
        $price_ac = $row->price - $price_ac;
        $price_ac = number_format($price_ac, 0, '', '.');
        $image = $row->image;
        if ($image) {
          $image = $row->image;
        } else {
          $image = 'notproduct.jpg';
        }
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="product">
          <div class="product-img">
            <div class="product-label">
              <span class="new"><?php echo $brand ?></span>
            </div>
            <?php echo "<img width='330' height='310' src='/app/files/products/" . $image . "'/>"; ?>
          </div>
          <div class="product-body">
            <h3 class="product-name">
              <a href="<?php echo "/app/producto/$nameurl"; ?>"><?php echo $name ?></a>
            </h3>
            <h4 class="product-price">
              $<?php echo $price_ac ?> <?php if ($row->discount > 0) { ?><del
                class="product-old-price">$<?php echo $price ?><?php } ?></del>
            </h4>
            <a class="primary-btn cta-btn" href="<?php echo "/app/producto/$nameurl"; ?>">Ver más</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>
<title>Luisxv.online</title>