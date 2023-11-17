                                                                                                                                                       <?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";
$iva= $total*0.08;
$ivatotal= $total + $iva;
$cl=1;
$ahora = date("Y-m-d H:i:s");
$manana = date("Y-m-d H:i:s", strtotime("+1 day"));
foreach ($_SESSION["carrito"] as $producto) {
	$cantidad=$producto->cantidad;
	}
$sentencia = $base_de_datos->prepare("INSERT INTO tbl_pedidos(id_cliente, precio, precio_total, iva, cantidad, fechaEnvio, fechaEntrega) VALUES (?, ?, ?, ?, ?, ?, ?);");
$sentencia->execute([$cl,$total, $ivatotal, $iva,$cantidad,$ahora,$manana]);

$sentencia2 = $base_de_datos->prepare("SELECT MAX(id_pedido) as max_id FROM tbl_pedidos;");
$sentencia2->execute();
$resultado = $sentencia2->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->max_id ;
echo "ID de Venta: " . $idVenta;

$base_de_datos->beginTransaction();
$sentencia3 = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_pedido, cantidad) VALUES (?, ?, ?);");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia3->execute([$producto->id_p, $idVenta, $producto->cantidad]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>