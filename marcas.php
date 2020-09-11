<?php include 'header.php';

if (empty($_GET["nameurl"])) {
  header("Location: informacion.php");
  die();
} else {
  $name_brands = $_GET["nameurl"];
  $name_brands = strtr($name_brands, "_", " ");
  $rbrands = $index->brands("$name_brands");
}
?>

<div class="container">
  <div class="row">
    <?php
    while ($row = $rbrands->fetch_object()) {
      $id = $row->brand_id;
      $name = $row->name;
      $nametitle = strtolower($name);
      $categorie = $row->categorie;
      $nameurl = str_replace(" ", "_", $categorie);
      $nameurl = strtolower($nameurl);
      $nameurl2 = strtr($name, " ", "_");
      $nameurl2 = strtolower($nameurl2);
      $image = $row->image;

    ?>
    <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12">
      <a href="<?php echo "/app/productos/$nameurl/$nameurl2"; ?>">
        <div class="shop">
          <div class="shop-img">
            <?php echo "<img width='230' height='160' src='/app/files/brands/" . $image . "'/>"; ?>
          </div>
          <div class="shop-body">
            <h3><?php echo $name ?></h3>
            <a href="<?php echo "/app/productos/$nameurl/$nameurl2"; ?>" class="cta-btn">Ver más <i
                class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </a>
    </div>
    <?php } ?>
  </div>
</div>
<?php include 'footer.php' ?>
<title><?php echo $nametitle ?> - Almacén Luisxv</title>