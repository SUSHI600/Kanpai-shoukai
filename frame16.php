<?php require 'header.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>SlideShow Sample</title>
  <!-- スライドショーで使うプラグイン「slick」のスタイルシートを読み込む -->
  <link rel="stylesheet" href="slick/slick.css">
  <link rel="stylesheet" href="slick/slick-theme.css">
  <!-- ここに2行追加 -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="slideshow">
    <!-- imagesフォルダ内にある画像を表示  -->
    <img src="img/otumami.jpg" alt="1">
    <img src="img/osake/2.jpg" alt="2">
    <img src="images/3.jpg" alt="3">
    <img src="images/4.jpg" alt="4">
    <!-- ここに4行追加 -->
  </div> 
  <script src="js/jquery-3.7.0.min.js"></script>
  <!-- スライドショーで使うプラグイン「slick」のJavaScriptを読み込む -->
  <script src="slick/slick.min.js"></script>
  <!-- ここに1行追加 -->
  <script src="js/slideshow.js"></script>
</body>
</html>