<div class="section">
  <div class="container">
    <div class="row">
      <?php
      while ($row = $rcategorie->fetch_object()) {
        $id = $row->id;
        $name = $row->name;
        $nameurl = strtr($name, " ", "_");
        $nameurl = strtolower($nameurl);
        $route = $row->route;
        $image = $row->image;
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="product">
          <div class="product-img">
            <?php echo "<img width='330' height='310' src='/app/files/categories/" . $image . "'/>"; ?>
          </div>
          <?php if ($route) { ?>
          <div class="product-body">
            <h3 class="product-name"> <a href="<?php echo "/app/marcas/$nameurl"; ?>"><?php echo $name ?></a>
            </h3>
            <a class="primary-btn cta-btn" href="<?php echo "/app/marcas/$nameurl"; ?>">Ver más</a>
          </div>
          <?php } else { ?>
          <div class="product-body">
            <h3 class="product-name"> <a href="<?php echo "/app/productos_esp/$nameurl"; ?>"><?php echo $name ?></a>
            </h3>
            <a class="primary-btn cta-btn" href="<?php echo "/app/productos_esp/$nameurl"; ?>">Ver Más</a>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>
<title>Luisxv.online</title>