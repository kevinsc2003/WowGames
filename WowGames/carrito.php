<?php
session_start();

$mensaje = "";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            $ID = openssl_decrypt($_POST['id'], COD, KEY);
            $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
            $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
            $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);

            if (is_numeric($ID) && is_string($NOMBRE) && is_numeric($CANTIDAD) && is_numeric($PRECIO)) {
                if (!isset($_SESSION['CARRITO'])) {
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                    );
                    $_SESSION['CARRITO'][0] = $producto;
                    $mensaje = "Producto agregado al carrito";
                } else {
                    $idProductos = array_column($_SESSION['CARRITO'], "ID");

                    if (in_array($ID, $idProductos)) {
                        $mensaje = "El producto ya ha sido seleccionado...";
                    } else {
                        $NumeroProductos = count($_SESSION['CARRITO']);
                        $producto = array(
                            'ID' => $ID,
                            'NOMBRE' => $NOMBRE,
                            'CANTIDAD' => $CANTIDAD,
                            'PRECIO' => $PRECIO
                        );
                        $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                        $mensaje = "Producto agregado al carrito";
                    }
                }
            } else {
                $mensaje = "Algo está incorrecto con los datos del producto.";
            }
            break;

        case "Eliminar":
            $ID = openssl_decrypt($_POST['id'], COD, KEY);

            if (is_numeric($ID)) {
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                        $mensaje = "Elemento borrado del carrito.";
                    }
                }
            } else {
                $mensaje = "Upss... ID incorrecto";
            }
            break;
    }
}
?>