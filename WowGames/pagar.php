<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<?php
$total = 0;

if ($_POST) {
    $total = 0;
    $Correo = $_POST['email'];
    $SID = session_id();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }

    $sentencia = $pdo->prepare("INSERT INTO `tblventas` 
    (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL,:ClaveTransaccion,'', NOW(), :Correo, :Total , 'pendiente');");

    $sentencia->bindParam(":ClaveTransaccion", $SID);
    $sentencia->bindParam(":Correo", $Correo);
    $sentencia->bindParam(":Total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        // Verifica si $producto['ID'] no es nulo antes de insertarlo en la tabla
        if (!is_null($producto['ID'])) {
            $sentencia = $pdo->prepare("INSERT INTO 
            `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
            VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');");

            $sentencia->bindParam(":IDVENTA", $idVenta);
            $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
            $sentencia->bindParam(":PRECIOUNITARIO", $producto['PRECIO']);
            $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);
            $sentencia->execute();
        } else {
            // Maneja el caso en el que $producto['ID'] es nulo
            // Puedes registrar un mensaje de error o tomar la acción necesaria aquí
            echo "Error: ID de producto nulo en el carrito.";
            //die();
        }
    }
    // echo "<h3>" . $total . "</h3>";
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    /* Estilos personalizados para el fondo */
    body {
        background-color: #f8f9fa; /* Color de fondo similar al código anterior */
    }

    .jumbotron {
        background-color: #343a40; /* Color de fondo del jumbotron */
        color: #ffffff; /* Color de texto del jumbotron */
    }
</style>

<div class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-4">¡GG PASO FINAL!</h1>
        <hr class="my-4">
        <p class="lead">Estás a punto de pagar con PayPal la cantidad:</p>
        <h4 class="mb-4">$<?php echo number_format($total, 2); ?></h4>
        <div id="paypal-button-container"></div>
        <p class="mt-4">Los productos podrán ser descargados una vez que se procese el pago.</p>
    </div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }
    }
</style>

<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox: 'AeVhPInj5jZPEZGVB5AF2_L9o495LXM-XbIsT4Cz8dSj2APQfl7N_q1UetE-yzwcMDZhIjb2IR4d72yy',
            production: 'AdN4qt_Q2cZqvZN_3WjBgItCQNb-E14FHoURewX5jpQuiOgnqe4-JnZ8JxVX8zykIHUXkUJw3gM3SpQk'
        },
        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $total; ?>', currency: 'USD' },
                            description: "Compra de productos a WOWGAMES: $ <?php echo number_format($total, 2); ?>",
                            custom: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"
                        }
                    ]
                }
            });
        },
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                console.log(data);
                window.location = "verificador.php?paymentToken=" + data.paymentToken
            });
        }
    }, '#paypal-button-container');
</script>

<?php include 'templates/pie.php'; ?>