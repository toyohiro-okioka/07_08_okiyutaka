<?php

include_once 'dbconnect.php';

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>会員登録機能</title>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>

<body>
	<div class="col-xs-6 col-xs-offset-3">

		<?php
		// signupがPOSTされたときに下記を実行
		if (isset($_POST['signup'])) {

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = '';
			$sql = 'INSERT INTO 07_08_okiyutaka(id, username, email, password) 
                        VALUES(NULL, :username, :email, :password)';

			// SQL準備&実行
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			$stmt->bindValue(':email', $email, PDO::PARAM_STR);
			$stmt->bindValue(':password', $password, PDO::PARAM_STR);
			$status = $stmt->execute();

			if ($status == true) { 	?>
				<div class="alert alert-success" role="alert">登録しました</div>
			<?php } else { ?>
				<div class="alert alert-danger" role="alert">エラーが発生しました。</div>
		<?php
			}
		}
		?>

		<form method="post">
			<h1>会員登録フォーム</h1>
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="ユーザー名" required />
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="メールアドレス" required />
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="パスワード" required />
			</div>
			<button type="submit" class="btn btn-default" name="signup">会員登録する</button>
			<a href="index.php">ログインはこちら</a>
		</form>

	</div>
</body>

</html>