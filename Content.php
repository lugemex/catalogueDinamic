<?php
session_start(); //esta instrucción debe la primera antes de cualquier etiqueta
include 'manageFiles.php';
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title> Content </title>
	<link rel = "stylesheet" href = "./style.css">
	
</head>
<body>

	<header class = "main_header">
		<form action = "#" method = "POST">
			<span class = "nav_header"><?php echo "Welcome: ".utf8_decode($_SESSION['usuario']);?></span>
			<input type = "submit" name = "logout" value = "Logout">
			<?php
			if(empty($_SESSION)){
				header("Location: index.php");
			}
			if(isset($_POST["logout"])){
				header("Location: Logout.php");
			}
			?>
		</form>
	</header>
	
	<h1 class = "pag_tittle">Content</h1>
	<ul>
		<?php
		$directoryOfImages='picturesRobots';
		$extensionsOfImages=array('gif','jpg','jpeg','tif','tiff','bmp','png');
		$listImg=getDirFiles($directoryOfImages,$extensionsOfImages);
		//printListFiles($listImg);
		//se muestran las imagenes existentes en el catalogo
		$numElements=count($listImg);
		if ($numElements>0){
			for($i=0;$i<$numElements;$i++){	
		?>

		<img src=<?php echo $listImg[$i];?>  alt="" heigth="150" width="200">

		<?php
			}
		}else{
			die('ERROR: No se encontraron imágenes en el directorio');
		}    
		?>
	</ul>

	<footer id="footer"><h1>KraussMaffei</h1></footer>		
</body>

</html>