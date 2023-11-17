<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_productos WHERE id_p = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id_p; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="nom_pro">Nombre:</label>
			<input value="<?php echo $producto->nom_pro ?>" class="form-control" name="nom_pro" required type="text" id="nom_pro" placeholder="Nombre">

			<label for="id_dep">ID Departamento:</label>
			<input value="<?php echo $producto->id_dep ?>" class="form-control" name="id_dep" required type="number" id="id_dep" placeholder="ID Departamento">

			<label for="proveedor">Nombre del proveedor:</label>
			<input value="<?php echo $producto->proveedor ?>" class="form-control" name="proveedor" required type="text" id="proveedor" placeholder="Proveedor">

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

			<label for="precio_total">Precio Total:</label>
			<input value="<?php echo $producto->precio_total ?>" class="form-control" name="precio_total" required type="number" id="precio_total" placeholder="Precio Total">
			
			<label for="iva">IVA:</label>
			<input value="<?php echo $producto->iva ?>" class="form-control" name="iva" required type="number" id="iva" placeholder="IVA">

			<label for="lote">Lote:</label>
			<input value="<?php echo $producto->lote ?>" class="form-control" name="lote" required type="number" id="lote" placeholder="Lote">

			<input value="<?php echo $id ?>" class="form-control" name="id_p" type="hidden" id="id_p">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
