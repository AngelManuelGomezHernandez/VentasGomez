<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["proveedor"]) || 
	!isset($_POST["id_dep"]) || 
	!isset($_POST["nom_pro"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["precio_total"]) || 
	!isset($_POST["iva"])	||
	!isset($_POST["lote"]) 
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$proveedor = $_POST["proveedor"];
$id_dep = $_POST["id_dep"];
$nom_pro = $_POST["nom_pro"];
$precio = $_POST["precio"];
$precio_to = $_POST["precio_total"];
$iva = $_POST["iva"];
$lote = $_POST["lote"]; 
$id_p = $_POST["id_p"];

$sentencia = $base_de_datos->prepare("UPDATE tbl_productos SET nom_pro = ?, id_dep = ?, proveedor = ?, precio = ?, precio_total = ?,iva = ?, lote = ? WHERE id_p = ?;");
$resultado = $sentencia->execute([$nom_pro, $id_dep, $proveedor, $precio, $precio_to, $iva, $lote, $id_p]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>