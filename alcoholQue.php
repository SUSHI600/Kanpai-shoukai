<link rel="stylesheet" href="css/Question.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"/>
<script src="js/question.js"></script>
<h1>アンケート</h1>
<h3>お酒の好みを選択してください</h3>
<span onclick="alcoholskip()">スキップ</span>
<div class="alcoholQue-cnt">
<ul>
    <li>味</li>
    <input type="radio" class="btn-check" name="taste" id="sweet" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="sweet">甘い</label>
    <input type="radio" class="btn-check" name="taste" id="spicy" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="spicy">辛い</label>
    <input type="radio" class="btn-check" name="taste" id="bitter" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="bitter">苦い</label>
    <li>種類</li>
    <input type="radio" class="btn-check" name="kinds" id="beer" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="beer">ビール</label>
    <input type="radio" class="btn-check" name="kinds" id="wine" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="wine">ワイン</label>
    <input type="radio" class="btn-check" name="kinds" id="liqueur" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="liqueur">リキュール</label>
    <li>地域</li>
    <input type="radio" class="btn-check" name="region" id="Asia" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Asia">アジア</label>
    <input type="radio" class="btn-check" name="region" id="America" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="America">アメリカ</label>
    <input type="radio" class="btn-check" name="region" id="Europe" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Europe">ヨーロッパ</label>
    <input type="radio" class="btn-check" name="region" id="Africa" autocomplete="off">
<label class="btn btn-secondary alcoholQue-label" for="Africa">アフリカ</label>
</ul>
</div>
<span onclick="alcoholskip()">次へ</span>