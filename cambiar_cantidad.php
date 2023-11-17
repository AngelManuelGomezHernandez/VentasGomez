<?php
if (!isset($_POST["indice"])) {
	exit("No hay índice");
}
$cantidad = floatval($_POST["cantidad"]);
$indice = intval($_POST["indice"]);
session_start();
$_SESSION["carrito"][$indice]->cantidad = $cantidad;
$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_total;
header("Location: ./vender.php");
