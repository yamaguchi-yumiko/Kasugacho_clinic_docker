<?php

define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
define('DB_USER', 'myappuser');
define('DB_PASS', 'myapppass');

try {
	$pdo = new PDO(
		DSN,
		DB_USER,
		DB_PASS,
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
			PDO::ATTR_EMULATE_PREPARES => false,

		]
	);
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

function getTodos($pdo){

$stmt = $pdo->query("SELECT * FROM admin_user ORDER BY id DESC");
$todos = $stmt->fetchALL();
echo '<pre>';
var_dump($todos);
echo '</pre>';

}

$todos = getTodos($pdo);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>My Todos</title>
</head>

<body>
	<h1>Todos</h1>
	<ul>
		<li>
			<input type="checkbox" checked>
			<span>Title</span>
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox">
			<span>Title</span>
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox">
			<span>Title</span>
		</li>
	</ul>
</body>

</html>