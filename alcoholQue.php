<?php require 'header2.php' ;?>
<link rel="stylesheet" href="css/Question.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"/>
<script src="js/question.js?v=1.0.1"></script>
<h1>アンケート</h1>
<div class="high-area">
    <button class="send" onclick="skip()">スキップ</button>
    <h3>お酒の好みを選択してください</h3>
</div>
<form  name="dbQue" action="Que1.php" method="post">
<div class="alcoholQue-cnt">
<ul>
    <li>味</li>
    <input type="radio" class="btn-check" name="taste" id="sweet" value="1" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="sweet">甘い</label>
    <input type="radio" class="btn-check" name="taste" id="spicy" value="2" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="spicy" >辛い</label>
    <input type="radio" class="btn-check" name="taste" id="bitter" value="3" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="bitter" >苦い</label>
    <li>種類</li>
    <input type="radio" class="btn-check" name="kinds" id="beer" value="1" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="beer" >ビール</label>
    <input type="radio" class="btn-check" name="kinds" id="wine" value="2" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="wine" >ワイン</label>
    <input type="radio" class="btn-check" name="kinds" id="liqueur" value="3" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="liqueur" >リキュール</label>
    <li>地域</li>
    <input type="radio" class="btn-check" name="region" id="Asia" value="1" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Asia" >アジア</label>
    <input type="radio" class="btn-check" name="region" id="America" value="2" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="America" >アメリカ</label>
    <input type="radio" class="btn-check" name="region" id="Europe" value="3" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Europe" >ヨーロッパ</label>
    <input type="radio" class="btn-check" name="region" id="Africa" value="4" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Africa" >アフリカ</label>
</ul>
</div>
<div class="send-area">
    <button class="send" onclick="sendpost()">次へ</button>
</div>
</form>
<?php include 'footer.php'; ?>
