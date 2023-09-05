<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<br>
<h3>Lista del carrito</h3>

<?php if (!empty($_SESSION['CARRITO'])) { ?>

    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="40%">Descripcion</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['CARRITO'] as $producto) { ?>
                <tr>
                    <td width="40%"> <?php echo $producto['NOMBRE'] ?></td>
                    <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                    <td width="20%" class="text-center">$<?php echo $producto['PRECIO'] ?></td>
                    <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <button class="btn btn-danger eliminar-btn" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
            <?php } ?>
            <tr>
                <td colspan="3" align="right" class="total-label">
                    <h3>Total</h3>
                </td>
                <td align="right" class="total-amount">
                    <h3>$<?php echo number_format($total, 2); ?> </h3>
                </td>
                <td></td>
            </tr>

            <tr>
                <td colspan="5">
                    <form action="pagar.php" method="post">
                        <div class="alert alert-success" role="alert">
                            <div class="form-group">
                                <label for="my-input"> Correo de contacto: </label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="Ingrese correo " required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted"> Los productos se enviarán a este correo </small>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder"> Proceder a pagar >>> </button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        No hay productos en el carrito...
    </div>
<?php  } ?>

<!-- Estilos CSS personalizados -->
<style>
    /* Botón de eliminar estilo */
    .eliminar-btn {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .eliminar-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* Etiquetas y cantidad total de estilo */
    .total-label {
        font-weight: bold;
        font-size: 18px;
    }

    .total-amount {
        font-weight: bold;
        font-size: 24px;
    }
</style>

<!-- JavaScript para confirmar antes de eliminar un producto -->
<script>
    const eliminarBotones = document.querySelectorAll('.eliminar-btn');
    eliminarBotones.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const confirmacion = confirm('¿Estás seguro de que deseas eliminar este producto del carrito?');
            if (!confirmacion) {
                e.preventDefault(); // Cancelar la acción de eliminación si el usuario no confirma
            }
        });
    });
</script>

<?php include 'templates/pie.php'; ?>