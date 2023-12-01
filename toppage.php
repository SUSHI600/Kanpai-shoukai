<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .slideshow-container {
      max-width: 500px;
      overflow: hidden;
      position: relative;
      margin: auto;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .mySlides {
      flex: 0 0 100%;
      width:200%;
    }

    .mySlides img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* 画像が親要素にフィットするように */
    }

    body {
      text-align: center; /* ページ全体を中央寄せ */
    }

    span {
      margin-right: 250px; /* ボタン間の間隔を設定 */
    }

    img {
      margin-right: 100px;/* 画像間の間隔を設定 */
      border-radius: 10px; 
    }
  </style>
  <?php require 'header.php' ?>

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
    var slides = document.querySelector('.slides');
    var slideWidth = document.querySelector('.mySlides').offsetWidth;

    slideIndex++;
    if (slideIndex >= slides.children.length) {
      slideIndex = 0;
    }

    slides.style.transform = 'translateX(' + (-slideIndex * slideWidth) + 'px)';
    setTimeout(showSlides, 3000); // 5秒ごとにスライドを切り替える
  }
</script>
<span button type="submit">お酒</button></span>
<span button="" type="submit style=" position:="" relative;="" left:="" 100px; style="
    position: relative;left: 100px;">おつまみ</span>
<span button="" type="submit" style="
    position: relative;left: 200px;">晩酌セット</span>
<img src="img/osake.jpg" alt="osake" width="300" height="150">
<img src="img/otumami.jpg" alt="otumami" width="300" height="150">
<img src="img/banshaku.jpg" alt="banshaku" width="300" height="150">
<!-- 追加の画像があればここに追加 -->

</body>
</html>
