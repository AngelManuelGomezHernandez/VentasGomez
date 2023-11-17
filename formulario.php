<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="nombre">Nombre</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

		<label for="id_dep">ID del departamento:</label>
		<input class="form-control" name="id_dep" required type="text" id="id_dep" placeholder="ID departamento">

		<label for="nom_pro">Nombre del proveedor:</label>
		<input class="form-control" name="nom_pro" required type="text" id="nom_pro" placeholder="Proveedor">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

		<label for="lote">Lote</label>
		<input class="form-control" name="lote" required type="number" id="lote" placeholder="Lote">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>