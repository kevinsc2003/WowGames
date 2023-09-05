<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo -->
    <title>WowGames - Tienda de VideoJuegos </title>
    <!-- Link de Bootstarp-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <!-- -->
    <style>
        /* Estilos personalizados */
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 18px;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            background-color: #222;
            border: none;
            color: #fff;
        }

        .card-title {
            font-size: 20px;
            margin-top: 10px;
        }

        .card-text {
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .badge-success {
            background-color: #28a745;
            font-size: 16px;
        }

        .badge-success:hover {
            background-color: #1e7e34;
        }

        .alert {
            background-color: #28a745;
            color: #fff;
            font-size: 18px;
        }

        .alert a {
            color: #fff;
            font-weight: bold;
            text-decoration: underline;
        }

        .jumbotron {
            background-image: url('fondo.jpg');
            background-size: cover;
            text-align: center;
            padding: 100px;
            color: #fff;
        }

        .jumbotron h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .jumbotron h4 {
            font-size: 24px;
            margin-top: 20px;
        }

        .jumbotron p {
            font-size: 18px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Inicio Cabecera -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php"> WowGames</a> <!-- navbar-brand le cambiamos  por una url cuando vamos a presionar logo-->
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mostrarCarrito.php">Carrito(
                        <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <br />
    <br />
    <div class="container">