<?php
session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Manejar acciones del carrito
if ($_POST) {
    if (isset($_POST['agregar_producto'])) {
        $id = $_POST['producto_id'];
        $nombre = $_POST['producto_nombre'];
        $precio = $_POST['producto_precio'];
        
        // Verificar si el producto ya existe en el carrito
        $existe = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $id) {
                $item['cantidad']++;
                $existe = true;
                break;
            }
        }
        
        // Si no existe, agregarlo
        if (!$existe) {
            $_SESSION['carrito'][] = [
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => 1
            ];
        }
        
        $_SESSION['mensaje'] = "¡{$nombre} agregado al carrito!";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['vaciar_carrito'])) {
        $_SESSION['carrito'] = [];
        $_SESSION['mensaje'] = "Carrito vaciado";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['eliminar_producto'])) {
        $id = $_POST['producto_id'];
        $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function($item) use ($id) {
            return $item['id'] != $id;
        });
        $_SESSION['mensaje'] = "Producto eliminado del carrito";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Calcular totales del carrito
$cantidad_items = array_sum(array_column($_SESSION['carrito'], 'cantidad'));
$total_carrito = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total_carrito += $item['precio'] * $item['cantidad'];
}

// Productos disponibles
$productos = [
    1 => [
        'nombre' => 'Ultrabook 14" i7 16GB/512GB',
        'marca' => 'NovaTech',
        'precio' => 3999000,
        'valoracion' => 4.2,
        'imagen' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'Pantalla 14" FHD',
            'Intel Core i7 13ª Gen',
            '16GB RAM, 512GB SSD',
            'Wi‑Fi 6, Thunderbolt'
        ]
    ],
    2 => [
        'nombre' => 'Smartphone 6.5" OLED 5G 256GB',
        'marca' => 'AeroPhone',
        'precio' => 2399000,
        'valoracion' => 4.7,
        'imagen' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'Pantalla OLED 120 Hz',
            'Cámara 50MP + gran angular',
            '256GB almacenamiento',
            'Batería 5000 mAh, carga rápida'
        ]
    ],
    3 => [
        'nombre' => 'Auriculares ANC Pro',
        'marca' => 'SoundWave',
        'precio' => 499900,
        'valoracion' => 4.4,
        'imagen' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'Cancelación activa de ruido',
            'Hasta 40h de batería',
            'Bluetooth 5.3 multipunto',
            'Estuche con carga USB‑C'
        ]
    ],
    4 => [
        'nombre' => 'Tablet 11" 8GB/256GB + Stylus',
        'marca' => 'PixelTab',
        'precio' => 1799000,
        'valoracion' => 4.3,
        'imagen' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'Pantalla 11" 2K',
            '8GB RAM, 256GB',
            'Soporte para lápiz',
            'Cuatro altavoces estéreo'
        ]
    ],
    5 => [
        'nombre' => 'Smartwatch Sport GPS',
        'marca' => 'FitPulse',
        'precio' => 649900,
        'valoracion' => 3.9,
        'imagen' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'GPS integrado',
            'Resistencia al agua 5ATM',
            'Seguimiento de salud 24/7',
            'Compatibilidad Android/iOS'
        ]
    ],
    6 => [
        'nombre' => 'Monitor 27" QHD 144 Hz',
        'marca' => 'VisionX',
        'precio' => 1399000,
        'valoracion' => 4.8,
        'imagen' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=250&fit=crop&crop=center',
        'caracteristicas' => [
            'Resolución 2560×1440',
            'Tasa de refresco 144 Hz',
            'AMD FreeSync / G‑Sync',
            'Entradas HDMI x2, DP x1'
        ]
    ]
];

// Generar estrellas
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

// Formatear precio
function formatearPrecio($precio) {
    return '$' . number_format($precio, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TechStore - Productos de Tecnología Premium</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cart-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-summary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .cart-summary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .cart-actions {
            display: flex;
            gap: 10px;
        }

        .btn-small {
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: #ff6b6b;
            color: white;
        }

        .btn-danger:hover {
            background: #ee5a52;
            transform: translateY(-1px);
        }

        /* Mensaje de notificación */
        .mensaje {
            background: linear-gradient(45deg, #00b894, #00cec9);
            color: white;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 12px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Main Content */
        main {
            padding: 40px 0;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 60px;
            color: white;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        /* Carrito detallado */
        .carrito-detalle {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .carrito-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .carrito-item:last-child {
            border-bottom: none;
            font-weight: bold;
            font-size: 1.2rem;
            color: #667eea;
        }

        .item-info {
            flex: 1;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Products Grid */
        .lista-productos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .tarjeta-producto {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .tarjeta-producto::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .tarjeta-producto:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        }

        .producto-imagen {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .producto-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .tarjeta-producto:hover .producto-imagen img {
            transform: scale(1.1);
        }

        .precio-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .producto-content {
            padding: 25px;
        }

        .producto-header h2 {
            font-size: 1.4rem;
            margin-bottom: 8px;
            color: #2d3436;
            line-height: 1.3;
        }

        .marca {
            color: #74b9ff;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .valoracion {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .estrellas {
            color: #ffd700;
            font-size: 1.1rem;
        }

        .puntuacion {
            background: #f8f9fa;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .caracteristicas {
            list-style: none;
            margin-bottom: 20px;
        }

        .caracteristicas li {
            padding: 6px 0;
            color: #636e72;
            position: relative;
            padding-left: 20px;
            font-size: 0.9rem;
        }

        .caracteristicas li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #00b894;
            font-weight: bold;
        }

        .producto-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.3);
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            color: white;
            text-align: center;
            padding: 40px 0;
            margin-top: 80px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            color: #667eea;
        }

        .footer-section p, .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            margin-bottom: 8px;
            display: block;
        }

        .footer-section a:hover {
            color: #667eea;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .lista-productos {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .producto-actions {
                flex-direction: column;
            }

            .cart-actions {
                flex-direction: column;
                width: 100%;
            }

            .carrito-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .item-actions {
                align-self: flex-end;
            }
        }

        /* Form styling */
        form {
            display: inline;
        }

        /* Hover Effects */
        .tarjeta-producto:hover .marca {
            color: #667eea;
        }

        .tarjeta-producto:hover .precio-badge {
            transform: scale(1.1);
        }

        /* Empty cart message */
        .carrito-vacio {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🚀 TechStore</div>
                <div class="cart-info">
                    <?php if ($cantidad_items > 0): ?>
                        <div class="cart-summary">
                            🛒 <?= $cantidad_items ?> productos - <?= formatearPrecio($total_carrito) ?>
                        </div>
                        <div class="cart-actions">
                            <form method="post">
                                <button type="submit" name="vaciar_carrito" class="btn-small btn-danger" 
                                        onclick="return confirm('¿Estás seguro de vaciar el carrito?')">
                                    🗑️ Vaciar carrito
                                </button>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="cart-summary">🛒 Carrito vacío</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <?php if (isset($_SESSION['mensaje'])): ?>
                <div class="mensaje">
                    <?= $_SESSION['mensaje'] ?>
                </div>
                <?php unset($_SESSION['mensaje']); ?>
            <?php endif; ?>

            <section class="hero-section">
                <h1 class="hero-title">Tecnología Premium</h1>
                <p class="hero-subtitle">Descubre los mejores productos tecnológicos con la calidad que mereces</p>
            </section>

            <?php if (!empty($_SESSION['carrito'])): ?>
            <section class="carrito-detalle">
                <h2 style="margin-bottom: 20px; color: #667eea;">🛒 Tu Carrito de Compras</h2>
                <?php foreach ($_SESSION['carrito'] as $item): ?>
                    <div class="carrito-item">
                        <div class="item-info">
                            <strong><?= htmlspecialchars($item['nombre']) ?></strong><br>
                            <small>Cantidad: <?= $item['cantidad'] ?> × <?= formatearPrecio($item['precio']) ?></small>
                        </div>
                        <div class="item-actions">
                            <span style="font-weight: bold; color: #667eea;">
                                <?= formatearPrecio($item['precio'] * $item['cantidad']) ?>
                            </span>
                            <form method="post">
                                <input type="hidden" name="producto_id" value="<?= $item['id'] ?>">
                                <button type="submit" name="eliminar_producto" class="btn-small btn-danger"
                                        onclick="return confirm('¿Eliminar este producto?')">
                                    ❌
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="carrito-item">
                    <div class="item-info">
                        <strong>TOTAL GENERAL</strong>
                    </div>
                    <div class="item-actions">
                        <strong><?= formatearPrecio($total_carrito) ?></strong>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <section aria-label="Listado de productos" class="lista-productos">
                <?php foreach ($productos as $id => $producto): ?>
                <article class="tarjeta-producto">
                    <div class="producto-imagen">
                        <img src="<?= $producto['imagen'] ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" />
                        <div class="precio-badge"><?= formatearPrecio($producto['precio']) ?></div>
                    </div>
                    <div class="producto-content">
                        <header class="producto-header">
                            <h2><?= htmlspecialchars($producto['nombre']) ?></h2>
                            <p class="marca">🏷️ <?= htmlspecialchars($producto['marca']) ?></p>
                        </header>
                        <div class="valoracion">
                            <span class="estrellas"><?= generarEstrellas($producto['valoracion']) ?></span>
                            <span class="puntuacion"><?= $producto['valoracion'] ?></span>
                        </div>
                        <ul class="caracteristicas">
                            <?php foreach ($producto['caracteristicas'] as $caracteristica): ?>
                                <li><?= htmlspecialchars($caracteristica) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <nav class="producto-actions">
                            <a href="#producto-<?= $id ?>" class="btn btn-secondary">👁️ Ver detalles</a>
                            <form method="post">
                                <input type="hidden" name="producto_id" value="<?= $id ?>">
                                <input type="hidden" name="producto_nombre" value="<?= htmlspecialchars($producto['nombre']) ?>">
                                <input type="hidden" name="producto_precio" value="<?= $producto['precio'] ?>">
                                <button type="submit" name="agregar_producto" class="btn btn-primary">
                                    🛒 Agregar
                                </button>
                            </form>
                        </nav>
                    </div>
                </article>
                <?php endforeach; ?>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>🚀 TechStore</h3>
                    <p>Tu tienda de confianza para productos tecnológicos premium. Calidad garantizada y envío gratuito.</p>
                </div>
                <div class="footer-section">
                    <h3>Servicio al Cliente</h3>
                    <a href="#">Contacto</a>
                    <a href="#">Soporte Técnico</a>
                    <a href="#">Garantías</a>
                    <a href="#">Devoluciones</a>
                </div>
                <div class="footer-section">
                    <h3>Información</h3>
                    <a href="#">Sobre Nosotros</a>
                    <a href="#">Políticas de Privacidad</a>
                    <a href="#">Términos y Condiciones</a>
                    <a href="#">Blog Tecnológico</a>
                </div>
            </div>
            <p>© 2025 TechStore. Todos los derechos reservados. Funciona con PHP puro.</p>
        </div>
    </footer>
</body>
</html>