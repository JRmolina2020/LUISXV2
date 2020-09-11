<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
'use strict';
console.clear();

jQuery(document).ready(function() {
  jQuery('.slider-control').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.products-nav',
    draggable: false,
    swipe: false,
    touchMove: false,
    accessibility: false
  });

  jQuery('.products-nav').slick({
    waitForAnimate: false,
    lazyLoad: 'progressive',
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-control',
    centerMode: false,
    focusOnSelect: true,
    arrows: false
  });

  jQuery('.next-slide').on('click', function() {
    jQuery('.slider-control').slick('slickNext');
  });
  jQuery('.prev-slide').on('click', function() {
    jQuery('.slider-control').slick('slickPrev');
  });
});
</script>
</body>


</html>