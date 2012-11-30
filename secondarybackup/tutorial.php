<?php
  $week = $_GET["week"];
  $backLink = "./index.php#week" . $week;
?>

<html>
  <head>
    <script src="http://cdn.optimizely.com/js/138697994.js"></script>
    <title>Football 4 Noobz</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

    <link rel="stylesheet" href="style.css" />
    <!-- link rel="apple-touch-icon" href="appicon.png" /-->
    <!-- link rel="apple-touch-startup-image" href="upstart.png"-->
  
    <script src="jquery-1.8.2.min.js"></script>
    <script src="jquery.mobile-1.2.0.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>
        <script>
      $(function () {
        $(".rslides").responsiveSlides({
          auto: false,
          pager: false,
          nav: true,
          speed: 300,
          namespace: "callbacks",

        });
      });
    </script>
  </head>
  <body>
  
    <div data-role="page" id="page1">
      <?php
				$backLink = "./weeks.php";
        include ("./header.php");
      ?>
      <div data-role="header">
        <h3>Tutorial</h3>
      </div>
      <div class = "callbacks_container">
        <ul class = "rslides">
            <li><img src="tutorialimgs/altpg1.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg4.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg5.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg6.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg7.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg8.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg9.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg10.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg11.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg12.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg13.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg14.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg15.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg16.jpg" alt= ""/></li>
            <li><img src="tutorialimgs/altpg17.jpg" alt= ""/></li>
        </ul>
      </div>
    </div>
  </body>
</html>

