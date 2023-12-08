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
        switch($image){
          case 'top/top1.jpg':
            echo '<a href="listalcohol.php">';
            break;
          case 'top/top2.jpg':
            echo '<a href="listsnack.php">';
            break;
          case 'top/top3.jpg':
            echo '<a href="listset.php">';
            break;
        }
        echo '<img src="' . $image . '"></a>';
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
  <span style="color: white;">お酒<br><button type="submit"><img src="img/osake.jpg" alt="osake" width="300" height="150"></button></span>
  </form>
  <form action="listsnack.php">
  <span style="color: white;"> おつまみ<br><button type="submit"><img src="img/otumami.jpg" alt="otumami" width="300" height="150"></button></span>
  </form>
  <form action="listset.php">
  <span style="color: white;"> 晩酌セット<br><button type="submit"><img src="img/banshaku.jpg" alt="banshaku" width="300" height="150"></button></span>
  </form>
</div>

</body>
</html>
