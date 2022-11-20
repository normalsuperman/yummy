<?php
	session_start();
	include "database.php";
	if (isset($_POST['ingredient'])) { $ingredient = $_POST['ingredient'];} 
	
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset=UTF-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="script.js" defer></script>
	<title></title>
</head>
<header>	
		<div class = "title">Найти рецепт</div>
		<ul class = "menu" >
		<li><a href ="index.php" "#">Главная</a></li>
		</ul>
</header>
<body>
<h1>Мы нашли для вас рецепты!</h1>
<?php
	$result=mysqli_query($induction,"select name_bludo, about_bludo, image_bludo from rec inner join bludo on (rec.id_bludo_r=bludo.id_bludo) inner join ing on (rec.id_ing_r=ing.id_ing) where ing.name_ing='$ingredient' LIMIT 0, 25;");
		while ($row=mysqli_fetch_array($result)){
			$name_bludo=$row['name_bludo'];
			$about_bludo=$row['about_bludo'];
			$image_bludo=$row['image_bludo'];
	?>
<tr>
		<td><img src="<?php echo $image_bludo;?>"></td>
		<td><?php echo $name_bludo;?> </td>
		<td><?php echo $about_bludo;?></td>
		</tr>
		<?php
}
?>


<h2></h2>
</body>

</html>
