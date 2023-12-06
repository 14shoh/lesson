<!DOCTYPE html>
<html>
<head>
	<title>Форма для ввода имя</title>
	
</head>
<body>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Имя :</label>
		<input type="text" name="name"><br>
		<label>Фамилия:</label>
		<input type="text" name="surname"><br>
		<input type="submit" value="Сохранить">
	</form>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		form {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 20px;
			width: 400px;
			margin: 50px auto;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		input[type=text] {
			padding: 10px;
			margin-bottom: 20px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		
	</style>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  
  $file = fopen("users.txt","a");
  fwrite($file, $name . " " . $surname . "\n");
  fclose($file);
  
  echo "Данные успешно сохранены!";
}
?><?php
$file = "users.txt";
if (file_exists($file)) {
  $data = file($file);
  $line_count = count($data);
  $file_size = filesize($file);
  echo "<p>Файл содержит " . $line_count . " строк и имеет размер " . $file_size . " байт.</p>";
  foreach ($data as $line) {
    echo $line . "<br>";
  }
} else {
  echo "Файл не найден.";
}
?>