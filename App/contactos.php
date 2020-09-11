<?php include 'header.php';
?>
<link rel="stylesheet" href="/app/css/contact.css">
<div class="section">
  <div class="container">
    <div class="row">
      <section class="card">
        <article>
          <h1 data-accordion-element-trigger>Números teléfonicos</h1>
          <div data-accordion-element-content class="content">
            <p>Atención al cliente <strong>3174426649</strong></p>
            <p>Postventa y garantia <strong>3176387613</strong></p>
            <p>Venta teléfonica <strong>3176417642</strong></p>
          </div>
        </article>
        <article>
          <h1 data-accordion-element-trigger>Horarios de atención</h1>
          <div data-accordion-element-content class="content">
            <p>Nuestros horarios de atención son de lunes a sábado de 8:00AM ha 6:00PM.</p>
          </div>
        </article>
        <article>
          <h1 data-accordion-element-trigger>Ubicación</h1>
          <div data-accordion-element-content class="content">
            <p>
              Nuentra tienda principal se encuentra ubicada en el centro de la ciudad de Valledupar. Cra. 7a #19a - 10.
            </p>
          </div>
        </article>
        <article>
          <h1 data-accordion-element-trigger>Postventa y garantia</h1>
          <div data-accordion-element-content class="content">
            <p>
              Para quejas,dudas de nuestros servicios o soporte de garantia Luis XV dispone del siguiente enlace para
              comunicarse con el equipo de posventa y garantia <a href="https://wa.link/e1ztxb"><i
                  class="fa fa-whatsapp" aria-hidden="true"> 317 6387613</i></a></p>
          </div>
        </article>
      </section>
    </div>
  </div>
</div>
</div>

<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/gh/cant89/gianni-accordion-js/dist/gianniAccordion.min.js">
</script>
<script>
var myAccordion = new gianniAccordion({
  elements: ".card article",
  trigger: "[data-accordion-element-trigger]",
  content: "[data-accordion-element-content]"
});


myAccordion.on("elementSelected", data => {
  console.log("elementOpened", data);
});
</script>
<title>Contactos - Almacén luisxv</title>