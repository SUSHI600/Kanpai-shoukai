<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<title>乾杯商会</title>
</head>

<body background="img/wood.jpg">
	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">酒楽広場</a>
			<form action="search.php" method="post" class="d-flex justify-content-center" style="width: 55%; padding:0 60px 0 250px;">
				<input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link active" aria-current="page" href="toppage.php">TOP</a>
					<a class="nav-link" aria-current="page" href="logout-input.php">ログイン/ログアウト</a>
					<a class="nav-link" aria-current="page" href="cart.php">カート</a>
					<a class="nav-link" aria-current="page" href="mypage.php">マイページ</a>
					<a class="nav-link" aria-current="page" href="recombeer.php">おすすめ</a>
					<a class="nav-link" aria-current="page" href="buyhistory.php">購入履歴</a>
				</div>
			</div>
		</div>
	</nav>