<link rel="stylesheet" href="css/Question.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"/>
<h1>アンケート</h1>
<span onclick="snackskip()">スキップ</span>
<ul>
    <li>味</li>
    <input type="radio" class="btn-check" name="taste" id="sweet" autocomplete="off">
<label class="btn btn-secondary" for="sweet">甘い</label>
    <input type="radio" class="btn-check" name="taste" id="spicy" autocomplete="off">
<label class="btn btn-secondary" for="spicy">辛い</label>
    <input type="radio" class="btn-check" name="taste" id="bitter" autocomplete="off">
<label class="btn btn-secondary" for="bitter">苦い</label>
    <li>地域</li>
    <input type="radio" class="btn-check" name="region" id="Asia" autocomplete="off">
<label class="btn btn-secondary" for="Asia">アジア</label>
    <input type="radio" class="btn-check" name="region" id="America" autocomplete="off">
<label class="btn btn-secondary" for="America">アメリカ</label>
    <input type="radio" class="btn-check" name="region" id="Europe" autocomplete="off">
<label class="btn btn-secondary" for="Europe">ヨーロッパ</label>
    <input type="radio" class="btn-check" name="region" id="Africa" autocomplete="off">
<label class="btn btn-secondary" for="Africa">アフリカ</label>
</ul>
<span>完了</span>