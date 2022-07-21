<?php
session_start();
require 'conexion.php';
require 'funciones.php';
$errors = array();
$correo = $_SESSION["username"];
if (!isset($_SESSION["username"])) {
    header("Location: inicio_sesionAdmin.php");
} else {
    if (!empty($_POST)) {
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        if (!codigoExiste($codigo)) {
            $errors[] = "El codigo ingresado no pertenece a algun producto";
        }else{
            if(cambiaProd($codigo,$precio,$cantidad)){
            }
            else{
                $errors[]="No se pudieron realizar los cambios, intentelo mas tarde";
            }
        }
        echo resultBlockMP($errors);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Productos</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<header>

<form action="busqueda.php" method="POST">
		<input name="que" class="buscar" type="Buscar" placeholder="Buscar...">
		<button name="buscar"id="btnBuscar">Buscar</button>
</form>


    <section id="Barra">
		<b id="correo">Correo: #@gmail.com</b>
	</section>

	<a id="principal" href="Productos.php">Softura Proyect</a>




    <section id="Menu2">

        <ul>
        <a href="productos.php">Productos</a>
			<a href="agregar.php">Agregar</a>
			<a href="modificar.php">Modificar</a>
			<a href="plomeria.php" >Plomeria</a>
			<a href="electricidad.php">Electricidad</a>
			<a href="construccion.php">Construccion</a>
			
        </ul>

    </section>
</header>

<body>

    <form method="POST" class="formulario3">
        <center>
            <p class="encabezado">Modificar Producto</p>
            <br><br>
            <input type="text" name="codigo" placeholder="&#x1f512; Código del producto" required>
            <input type="text" name="precio" placeholder="💲 Precio Público" required>
            <input type="text" name="cantidad" placeholder="Cantidad" required>
        </center>

        <center>

            <br><br>
            <button id="iniciarS">Guardar</button>
            <br><br><br>



    </form>

</body>

</html>