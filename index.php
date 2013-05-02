<?php
/*
	index.php
	
	Ultima modificación: 2013-05-01
	
	Campos del formulario:
		usuario		: RFC del empleado
		contrasena	: Contraseña del empleado
		login		: Requerido para el proceso de inicio de sesión
	
	Errores:
		error	: Usuario o contraseña invalidos
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Iniciar sesión</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<form method="post" action="login.php" class="login">
			<p>
				<label for="login">Usuario:</label>
				<input type="text" name="usuario" placeholder="Ingrese aquí su CURP" />
			</p>
			<p>
				<label for="password">Contraseña:</label>
				<input type="password" name="contrasena" placeholder="Ingrese aquí su contraseña"  />
				<input type="hidden" name="login"  />
			</p>
			<p class="login-submit">
				<button type="submit" class="login-button">Login</button>
			</p>
			<?php
			if ( isset($_GET["error"]) ){
				echo "<p class='forgot-password'>Usuario o contraseña incorrectos</p>";
			}
			?>
		</form>
	</body>
</html>
