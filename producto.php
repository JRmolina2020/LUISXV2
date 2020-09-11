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
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-push-2">
        <?php
        $row = $rproduct->fetch_object();
        $id = $row->id;
        if (empty($id)) {
          header("Location: informacion.php");
        } else {
          $ref = $row->ref;
          $name = $row->product;
          $description = $row->description;
          $specs = $row->specs;
          $embed = $row->embed;
          $price = number_format($row->price, 0, '', '.');
          $price_e = number_format($row->price_e, 0, '', '.');
          $price_ac = $row->price * $row->discount;
          $price_ac = $row->price - $price_ac;
          $price_ac = number_format($price_ac, 0, '', '.');
          $image = $row->image;
          $image2 = $row->image2;
          $image3 = $row->image3;
          if ($image) {
            $image = $row->image;
          } else {
            $image = 'notproduct.jpg';
          }
        }
        ?>
        <div id="product-main-img">
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image . "'/>"; ?>
          </div>
          <?php if ($image2) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image2 . "'/>"; ?>
          </div>
          <?php } ?>
          <?php if ($image3) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image3 . "'/>"; ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-2 col-md-pull-5">
        <div id="product-imgs">
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image . "'/>"; ?>
          </div>
          <?php if ($image2) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image2 . "'/>"; ?>
          </div>
          <?php } ?>
          <?php if ($image3) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image3 . "'/>"; ?>
          </div>
          <?php } ?>
        </div>
        <br>
      </div>
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name"><?php echo $name ?></h2>
          <span>REF:<?php echo $ref ?></span>
          <div>
            <h3 class="product-price">
              $<?php echo $price_ac ?> <?php if ($row->discount > 0) { ?><del
                class="product-old-price">$<?php echo $price ?><?php } ?></del>
            </h3>
            <?php if ($row->price_e > 0) { ?>
            <br>
            <h3 class="product-price2"> Precio especial: $<?php echo $price_e ?><?php } ?></h3>

            <ul class="nav nav-pills" id="myTab" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#informacion"
                  role="tab" aria-controls="home" aria-selected="true">Información</a></li>
              <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#especificaciones"
                  role="tab" aria-controls="profile" aria-selected="false">Especificaciones</a></li>
              <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#video" role="tab"
                  aria-controls="contact" aria-selected="false">Video</a></li>
            </ul>
          </div>
          <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="informacion" role="tabpanel" aria-labelledby="home-tab">
              <div id="float-cta">
                <span>Envianos un whatsapp!</span>
                <a href="javascript:void(0);">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i>
                  <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="whatsapp-msg-container">
                  <div class="whatsapp-msg-header">
                    <h6>WhatsApp Chat</h6>
                  </div>
                  <div class="whatsapp-msg-body">
                    <textarea id="url" name="whatsapp-msg" class="whatsapp-msg-textarea"></textarea>
                  </div>
                  <div class="whatsapp-msg-footer">
                    <button type="button" class="btn-whatsapp-send">Enviar</button>
                  </div>
                </div>
              </div>
              <p class="product-description">
                <br>
                <?php if (empty($description)) {
                  echo '<p>Sin descripción</p>';
                } else {
                  echo  nl2br($description);
                }
                ?>
              </p>
            </div>
            <div class="tab-pane fade" id="especificaciones" role="tabpanel" aria-labelledby="profile-tab">
              <p class="product-description">
                <br>
                <?php echo nl2br($specs) ?>
              </p>
            </div>
            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="contact-tab">
              <br>
              <?php if ($embed) { ?>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $embed ?>?rel=0"
                  allowfullscreen></iframe>
              </div>
              <?php } else {
                echo '<p><strong>El producto no cuenta con un video actualmente</strong></p>';
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
var URLactual = window.location;
let msg = "hola, estoy interesado en el siguiente producto: "
document.getElementById("url").innerHTML = msg + URLactual;
</script>
<?php include 'footer.php' ?>
<title>Almacén Luisxv</title>