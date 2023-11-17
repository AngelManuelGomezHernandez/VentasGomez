<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>ID Departamento</th>
					<th>Nombre del proveedor</th>
					<th>Precio</th>
					<th>Precio Total</th>
					<th>IVA</th>
					<th>Lote</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id_p ?></td>
					<td><?php echo $producto->nom_pro ?></td>
					<td><?php echo $producto->id_dep ?></td>
					<td><?php echo $producto->proveedor ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->precio_total ?></td>
					<td><?php echo $producto->iva ?></td>
					<td><?php echo $producto->lote ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id_p?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id_p?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>