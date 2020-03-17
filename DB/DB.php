<?php

require_once './DB/DBRegistrationData.php';

try {
	$pdo = new PDO("mysql:host=localhost;dbname=muse;charset=utf8", DB_USER, DB_PASSWORD, DB_OPTIONS);
} catch (PDOException $e) {
	die("Не могу подключиться к базе данных");
}

//$result = $pdo->query('SELECT * FROM erg');
//$result = $pdo->query('SELECT * FROM erg WHERE id=5');
//show($result);

$sql = 'SELECT * FROM erg WHERE id = :id';
$stmt = $pdo->prepare($sql);

$params = [':id' => '5'];
$stmt->execute($params);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($rows);
echo '</pre>';

//функция отображает результат выборки массива
/*
function show($result)
{
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	};
}
*/

//функция отображает результат выборки массива

function show($result)
{
	$row = $result->fetchALL(PDO::FETCH_ASSOC);

	echo '<pre>';
	print_r($row);
	echo '</pre>';
}
