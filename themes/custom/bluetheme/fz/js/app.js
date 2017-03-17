$('.center').slick({
  centerMode: true,
  infinite: true,
  slidesToShow: 3,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 6000,
  variableWidth: true,
});
$('.center').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  console.log('beforeChange', currentSlide, nextSlide);
});
$('.center').on('afterChange', function(event, slick, currentSlide){
  console.log('afterChange', currentSlide);
});