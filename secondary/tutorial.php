<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>ResponsiveSlides.js &middot; Responsive jQuery slideshow</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="../responsiveslides.css" />
  <link rel="stylesheet" href="demo.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="../responsiveslides.min.js"></script>
  <script>
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });

      // Slideshow 2
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        speed: 300,
        maxwidth: 540
      });

      // Slideshow 3
      $("#slider3").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,

      });

    });
  </script>
</head>
<body>
  <div id="wrapper">
    <!-- Slideshow 2 -->
    <ul class="rslides" id="slider2">
      <li><a href="#"><img src="howto1.jpg" alt="" /></a></li>
      <li><a href="#"><img src="howto2.jpg" alt="" /></a></li>
      <li><a href="#"><img src="howto3.jpg" alt="" /></a></li>
    </ul>
    <a href = "#" class = "rslides_nav rslides3_nav prev">Previous</a>
    <a href = "#" class = "rslides_nav rslides3_nav next">Next</a>
   
    
  </div>
</body>
</html>
