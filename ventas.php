<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT tbl_pedidos.id_pedido, tbl_pedidos.precio_total, tbl_pedidos.fechaEntrega, GROUP_CONCAT(tbl_productos.id_p, '..', tbl_productos.nom_pro, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM tbl_pedidos INNER JOIN productos_vendidos ON productos_vendidos.id_pedido = tbl_pedidos.id_pedido INNER JOIN tbl_productos ON tbl_productos.id_p = productos_vendidos.id_producto GROUP BY tbl_pedidos.id_pedido ORDER BY tbl_pedidos.id_pedido;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
    <h1>Productos Vendidos</h1>
    <div>
        <a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Número</th>
                <th>Fecha</th>
                <th>Productos vendidos</th>
                <th>Total</th>
                <th>Ticket</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta) { ?>
                <tr>
                    <td><?php echo $venta->id_pedido ?></td>
                    <td><?php echo $venta->fechaEntrega ?></td>
                    <td>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (explode("__", $venta->productos) as $productosConcatenados) {
                                    $producto = explode("..", $productosConcatenados);
                                    ?>
                                    <tr>
                                    <td><?php echo isset($producto[0]) ? $producto[0] : ''; ?></td>
                                    <td><?php echo isset($producto[1]) ? $producto[1] : ''; ?></td>
                                    <td><?php echo isset($producto[2]) ? $producto[2] : ''; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                    <td><?php echo $venta->precio_total ?></td>
                    <td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id_pedido ?>"><i class="fa fa-print"></i></a></td>
                    <td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id_pedido ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once "pie.php" ?>
