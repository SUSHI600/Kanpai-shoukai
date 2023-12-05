<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/toppage.css">
  <?php require 'header.php' ?>

</head>

<body>

<div class="slideshow-container">
  <div class="slides">
    <?php
      $imageList = glob("top/*.jpg");
      foreach ($imageList as $image) {
        echo '<div class="mySlides">';
        echo '<img src="' . $image . '">';
        echo '</div>';
      }
    ?>
  </div>
</div>

<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var slidesContainer = document.querySelector('.slides');
    var slideWidth = document.querySelector('.mySlides').offsetWidth;

    slideIndex++;
    if (slideIndex >= slidesContainer.children.length) {
      slideIndex = 0;
    }

    slidesContainer.style.transform = 'translateX(' + (-slideIndex * slideWidth) + 'px)';
    setTimeout(showSlides, 3000); // 5秒ごとにスライドを切り替える
  }
</script>

<div class="form-container">
  <form  action="listalcohol.php">
  お酒<span><button type="submit"><img src="img/osake.jpg" alt="osake" width="300" height="150"></button></span>
  </form>
  <form action="listsnack.php">
  おつまみ<span><button type="submit"><img src="img/otumami.jpg" alt="otumami" width="300" height="150"></button></span>
  </form>
  <form action="listset.php">
  晩酌セット<span><button type="submit"><img src="img/banshaku.jpg" alt="banshaku" width="300" height="150"></button></span>
  </form>
</div>

</body>
</html>
