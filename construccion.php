<?php

    
	require 'conexion.php';
	

?>
<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Productos</title>

	<link rel="stylesheet" href="./css/prodcts.css">
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




	<section id="Menu">

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
    <h1>Catalogo: Construccion</h1>
    <div class= "container">
        <?php
            include("conexion.php");
            $query = "SELECT * FROM prod_inventario where CATEGORIA = 'Construcción'";
            $resultado= $conexion->query($query);
            while($row = $resultado->fetch_assoc()){

            ?>
                <div class= "card" >
                    <img src="data:image/png;base64, <?php echo base64_encode($row['IMAGEN']); ?>">
                    <br><br>
                    <h4>Nombre: <?php echo $row['NOMBRE_PRODUC'];?> </h4>
                    <h5> $ <?php echo number_format($row['PRECIO'], 2, '.',',');?> M/N </h5>
					<h5> Codigo:<?php echo $row['CODIGO']?></h5>
                    <br><br>
                </div>

            <?php
                }
            ?>
    </div>

</body>


</html>