<?php
session_start();

if (!isset($_POST["id_p"])) {
    header("Location: ./vender.php");
    exit;
}

$id_p = $_POST["id_p"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_productos WHERE id_p = ? LIMIT 1;");
$sentencia->execute([$id_p]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

if (!$producto) {
    header("Location: ./vender.php?status=4");
    exit;
}

# Buscar producto dentro del carrito
$indice = false;
foreach ($_SESSION["carrito"] as $key => $carritoProducto) {
    if ($carritoProducto->id_p == $id_p) {
        $indice = $key;
        break;
    }
}

# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    $producto->total = $producto->precio_total;
    array_push($_SESSION["carrito"], $producto);
} else {
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total += $_SESSION["carrito"][$indice]->precio_total;
}

header("Location: ./vender.php");
?>