<?php
session_start();
require 'conexion.php';
require 'funciones.php';
$errors = array();
if (!isset($_SESSION["username"])) {
    header("Location: inicio_sesionAdmin.php");
}
if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $codigo = $_POST['codigo'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $tipo = $_FILES['imagen']['type'];

    $categoria = $_POST['categoria'];
    if (codigoExiste($codigo)) {
        $errors[] = "El codigo que ingreso ya se encuentra registrado";
    } else {
        if ($tipo != 'image/png' && $tipo != 'image/jpg') {
            $errors[] = "Unicamente se acepta este formato de archivo: PNG y JPG";
        } else {
            if (numValido($precio, $cantidad)) {

                if (agregarProd($nombre, $marca, $precio, $cantidad, $descripcion, $codigo, $imagen, $categoria)) {
                } else {
                    $errors[] = "Error al registrar producto, intentelo de nuevo";
                }
            }else{
                $errors[]="Debe ingresar un precio o cantidad valido";
            }
        }
    }
    echo resultBlockAP($errors);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar productos</title>
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

    <form method="POST" enctype="multipart/form-data" class="formulario6">
        <center>
            <p class="encabezado">Agregar producto</p>
            <br>

            <input type="text" name="nombre" placeholder="&#128394; Nombre del producto" required autofocus>
            <input type="text" name="marca" placeholder="&#128394; Marca" required autofocus>
            <input type="text" name="precio" placeholder="&#128178; Precio público" required autofocus>
            <input type="text" name="cantidad" placeholder="&#128394; Cantidad" required autofocus>
            <input type="text" name="descripcion" placeholder="&#x1f4dd; Descripción del producto" required autofocus>
            <input type="text" name="codigo" placeholder="&#128223; Código del producto" required>
            <input type="file" name="imagen" placeholder="🏞️ Imagen" required>
            <br><br>
            <p class="categoria">Indique la categoria del producto</p>
            <br>
            <select name="categoria" id="" require>
                <option value="" style="display: none;"></option>
                <option value="Electricidad">Electricidad</option>
                <option value="Plomería">Plomería</option>
                <option value="Construcción">Construcción</option>
            </select>
            <br><br>


        </center>

        <center>

            <button id="btn_agregarP">Agregar producto</button>
            <br><br><br>

        </center>



    </form>

</body>

</html>