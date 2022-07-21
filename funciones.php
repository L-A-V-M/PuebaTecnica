<?php
require 'conexion.php';




function resultBlock($errors)
{
    if (count($errors) > 0) {
        echo "<div class='alert' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='bien' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        echo "<li>" . "Registro exitoso, ahora puede iniciar sesión." . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}
function resultBlockISC($errors)
{
    if (count($errors) > 0) {
        echo "<div class='alertISC' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='bienISC' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        echo "<li>" . "Registro exitoso, ahora puede iniciar sesión." . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}
function resultBlockRCC($errors)
{
    if (count($errors) > 0) {
        echo "<div class='alertRCC' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='bienRCC' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        echo "<li>" . "Registro exitoso, ahora puede iniciar sesión." . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}
function resultBlockMP($errors)
{
    if (count($errors) > 0) {
        echo "<div class='alertMP' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='bienMP' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        echo "<li>" . "Se han guardado los cambios" . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}
function resultBlockAP($errors)
{
    if (count($errors) > 0) {
        echo "<div class='alertAP' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='bienAP' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        echo "<li>" . "El producto ha sido registrado exitosamente" . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}



function getValor($campo, $campoWhere, $valor)
{
    global $conexion;
    $query = "SELECT COUNT(*) as contar from UCliente where $campoWhere='$valor'";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);
    if ($array['contar'] > 0) {
        $query = "SELECT  $campo from UCliente where $campoWhere='$valor'";
        $consulta = mysqli_query($conexion, $query);
        $array = mysqli_fetch_array($consulta);
        $_campo = $array[$campo];
        return $_campo;
    }
}

function codigoExiste($codigo)
{
    global $conexion;
    $codigo = strval($codigo);
    $query = "SELECT COUNT(*) as contar FROM Prod_Inventario WHERE CODIGO= '$codigo'";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar'] > 0) {
        return true;
    } else {
        return false;
    }
}
function cambiaProd($codigo, $precio, $cantidad)
{
    global $conexion;
    $query = "UPDATE Prod_Inventario SET PRECIO='$precio', CANTIDAD='$cantidad' where CODIGO='$codigo'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}

function agregarProd($nombre, $marca, $precio, $cantidad, $descripcion, $codigo, $imagen, $categoria)
{
    global $conexion;
    $query = "INSERT INTO Prod_Inventario(NOMBRE_PRODUC, MARCA, PRECIO, CANTIDAD, DESCRIPCION, CODIGO, IMAGEN, CATEGORIA) VALUES('$nombre','$marca','$precio','$cantidad','$descripcion','$codigo','$imagen','$categoria')";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}
function numValido($precio,$cantidad){
    if($precio>0 && $cantidad>0)
    {
        return true;
    }else{
        return false;
    }
}
function Eliminar($codigo){
    global $conexion;
    $query = "DELETE FROM Prod_Inventario WHERE CODIGO = '$codigo' ";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}
?>