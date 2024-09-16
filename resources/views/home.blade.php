<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance HairHub</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Encabezado con logo */
        header {
            background-color: #f5f5f5;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            height: 50px;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        /* Imagen principal */
        .banner {
            width: 100%;
            height: 400px;
            background: url('ruta-a-tu-imagen.jpg') center/cover no-repeat;
        }
        /* Menú inferior */
        .bottom-menu {
            display: flex;
            justify-content: space-around;
            padding: 15px;
            background-color: #f5f5f5;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .bottom-menu a {
            text-align: center;
            text-decoration: none;
            color: #333;
        }
        .bottom-menu i {
            font-size: 24px;
        }
    </style>
</head>
<body>

    <!-- Encabezado con el logo y menú de navegación -->
    <header>
        <img src="img/logo.png">
        <nav>
            <a href="inicio">inicio</a> 
            <a href="servicios">Servicios</a>
            <a href="productos">Productos</a>
            <a href="agendamiento">Agenda tu Cita</a>
            <a href="carrito">
                <i class="fas fa-shopping-cart"></i>
                <span>Carrito</span>
            </a>
        </nav>
    </header>

    <!-- Imagen principal o banner -->
    <div class="banner"></div>

</body>
</html>
