<?php

// logout.php?logoutにアクセスしたユーザーをログアウトする
if(isset($_GET['logout'])) {
	header("Location: index.php");
} else {
	header("Location: index.php");
}
