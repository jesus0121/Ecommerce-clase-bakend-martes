<?php
session_start();

// Lista de productos (igual que en index.php)
$productos = [
    1 => [
        'nombre' => 'Ultrabook 14" i7 16GB/512GB',
        'marca' => 'NovaTech',
        'precio' => 3999000,
        'valoracion' => 4.2,
        'imagen' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=500&fit=crop&crop=center',
        'descripcion' => 'Una laptop ultradelgada y potente, ideal para trabajo y productividad en movimiento.',
        'caracteristicas' => [
            'Pantalla 14" FHD',
            'Intel Core i7 13ª Gen',
            '16GB RAM, 512GB SSD',
            'Wi-Fi 6, Thunderbolt'
        ]
    ],
    // ... aquí podrías copiar el resto de productos
];

// Recibir id
$id = $_GET['id'] ?? null;

if (!$id || !isset($productos[$id])) {
    echo "Producto no encontrado.";
    exit;
}

$producto = $productos[$id];

// Funciones de ayuda
function generarEstrellas($valoracion) {
    $estrellas = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= floor($valoracion)) {
            $estrellas .= '★';
        } elseif ($i == ceil($valoracion) && $valoracion - floor($valoracion) >= 0.5) {
            $estrellas .= '★';
        } else {
            $estrellas .= '☆';
        }
    }
    return $estrellas;
}

function formatearPrecio($precio) {
    return '$' . number_format($precio, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($producto['nombre']) ?> - TechStore</title>
    <style>
        body {font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0;}
        .container {max-width: 1000px; margin: 40px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 8px 25px rgba(0,0,0,0.1);}
        .producto {display: flex; gap: 30px; flex-wrap: wrap;}
        .producto img {max-width: 400px; border-radius: 10px;}
        .detalle {flex: 1;}
        h1 {margin-bottom: 10px; color: #333;}
        .marca {color: #667eea; font-weight: bold; margin-bottom: 15px;}
        .precio {font-size: 1.8rem; color: #e74c3c; margin: 20px 0;}
        .valoracion {color: #ffd700; margin-bottom: 20px;}
        ul {list-style: none; padding: 0;}
        ul li::before {content: "✔ "; color: #27ae60;}
        .btn {display: inline-block; padding: 12px 20px; background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 8px; text-decoration: none; font-weight: bold;}
        .btn:hover {opacity: 0.9;}
        .volver {margin-top: 30px; display: block; text-align: center;}
    </style>
</head>
<body>
    <div class="container">
        <div class="producto">
            <img src="<?= $producto['imagen'] ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>">
            <div class="detalle">
                <h1><?= htmlspecialchars($producto['nombre']) ?></h1>
                <p class="marca">Marca: <?= htmlspecialchars($producto['marca']) ?></p>
                <div class="valoracion"><?= generarEstrellas($producto['valoracion']) ?> (<?= $producto['valoracion'] ?>)</div>
                <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                <div class="precio"><?= formatearPrecio($producto['precio']) ?></div>
                <h3>Características:</h3>
                <ul>
                    <?php foreach ($producto['caracteristicas'] as $caracteristica): ?>
                        <li><?= htmlspecialchars($caracteristica) ?></li>
                    <?php endforeach; ?>
                </ul>
                <form method="post" action="index.php">
                    <input type="hidden" name="producto_id" value="<?= $id ?>">
                    <input type="hidden" name="producto_nombre" value="<?= htmlspecialchars($producto['nombre']) ?>">
                    <input type="hidden" name="producto_precio" value="<?= $producto['precio'] ?>">
                    <button type="submit" name="agregar_producto" class="btn">🛒 Agregar al carrito</button>
                </form>
            </div>
        </div>
        <a href="index.php" class="volver">⬅️ Volver a la tienda</a>
    </div>
</body>
</html>
