<?php

include_once 'dbconnect.php';

?>

<?php
if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = '';
	$sql = 'SELECT * FROM 07_08_okiyutaka WHERE email = :email AND password = :password';

	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->bindValue(':password', $password, PDO::PARAM_STR);
	$status = $stmt->execute();

	if ($status == false) {
		$error = $stmt->errorInfo();
		exit('sqlError:' . $error[2]);
	} else {
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定

		foreach ($result as $record) {
			header("Location: home.php");
			exit;
		}
	}
} ?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ログイン機能</title>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
</head>

<body>
	<div class="col-xs-6 col-xs-offset-3">

		<form method="post">
			<h1>ログインフォーム</h1>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="メールアドレス" required />
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="パスワード" required />
			</div>
			<button type="submit" class="btn btn-default" name="login">ログインする</button>
			<a href="register.php">会員登録はこちら</a>
		</form>

	</div>
</body>

</html>