<?php require 'header2.php' ;?>
<link rel="stylesheet" href="css/Question.css?v=1.0.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"/>
<h1>アンケート</h1>
<h3>おつまみの好みを選択してください</h3>
<span onclick="location.href='login-input.php'">スキップ</span>
<form  name="dbQue" action="Que2.php" method="post">
<div class="snackQue-cnt">
<ul>
    <li>味</li>
    <input type="radio" class="btn-check" name="taste" id="sweet" value="1" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="sweet" >甘い</label>
    <input type="radio" class="btn-check" name="taste" id="spicy" value="2" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="spicy" >辛い</label>
    <input type="radio" class="btn-check" name="taste" id="bitter" value="3" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="bitter" >苦い</label>
    <li>地域</li>
    <input type="radio" class="btn-check" name="region" id="Asia" value="1" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="Asia" >アジア</label>
    <input type="radio" class="btn-check" name="region" id="America" value="2" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="America" >アメリカ</label>
    <input type="radio" class="btn-check" name="region" id="Europe" value="3" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="Europe" >ヨーロッパ</label>
    <input type="radio" class="btn-check" name="region" id="Africa" value="4" autocomplete="off">
<label class="btn btn-secondary snackQue-label" for="Africa" >アフリカ</label>
</ul>
</div>
<span onclick="sendpost()">完了</span>
</form>
<script src="./js/snackQue.js"></script>
<?php include 'footer.php'; ?>
