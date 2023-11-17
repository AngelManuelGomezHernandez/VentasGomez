<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["id_dep"]) || !isset($_POST["nom_pro"]) || !isset($_POST["precio"]) || !isset($_POST["lote"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$id_dep = $_POST["id_dep"];
$nom_pro = $_POST["nom_pro"];
$precio = $_POST["precio"];
/*$precio_to = $_POST["precio_to"];
$iva = $_POST["iva"];*/
$lote = $_POST["lote"];
$iva=$precio*0.08;
$precio_to=$precio+$iva;
$sentencia = $base_de_datos->prepare("INSERT INTO tbl_productos(nom_pro, id_dep, proveedor, precio, precio_total, iva, lote) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $id_dep, $nom_pro, $precio, $precio_to,$iva,$lote]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>