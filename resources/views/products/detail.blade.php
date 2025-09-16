<?php
session_start();

// Productos (usa los mismos datos que enviaste)
$productos = [
    1 => [
        'nombre' => 'Ultrabook 14" i7 16GB/512GB',
        'marca' => 'NovaTech',
        'precio' => 3999000,
        'valoracion' => 4.2,
        'imagen' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=1200&h=800&fit=crop&crop=center',
        'galeria' => [
            'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=600&fit=crop&crop=center',
            'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=800&h=600&fit=crop&crop=center',
            'data:image/jpeg;base64,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',
            'data:image/jpeg;base64,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'
        ],
        'caracteristicas' => [
            'Pantalla 14" FHD',
            'Intel Core i7 13ª Gen',
            '16GB RAM, 512GB SSD',
            'Wi-Fi 6, Thunderbolt'
        ],
        'codigo' => 'NT-ULTR-1401'
    ]
];

// Si no existe carrito, crear
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Helpers
function formatearPrecio($precio) {
    return '$' . number_format($precio, 0, ',', '.');
}
function generarEstrellas($valoracion) {
    $est = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= floor($valoracion)) $est .= '★';
        elseif ($i == ceil($valoracion) && ($valoracion - floor($valoracion)) >= 0.5) $est .= '★';
        else $est .= '☆';
    }
    return $est;
}

// Obtener id del producto (por GET), predeterminado 1
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
if (!isset($productos[$id])) {
    echo "Producto no encontrado.";
    exit;
}
$product = $productos[$id];

// Manejo formulario agregar al carrito (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar_producto'])) {
    $cantidad = max(1, intval($_POST['cantidad']));
    $id_post = intval($_POST['producto_id']);
    // Verificar si existe ya en carrito y aumentar cantidad
    $found = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] === $id_post) {
            $item['cantidad'] += $cantidad;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $_SESSION['carrito'][] = [
            'id' => $id_post,
            'nombre' => $productos[$id_post]['nombre'],
            'precio' => $productos[$id_post]['precio'],
            'cantidad' => $cantidad
        ];
    }
    $_SESSION['mensaje'] = "{$productos[$id_post]['nombre']} agregado al carrito ({$cantidad}).";
    // Redirigir para evitar reenvío de formulario
    header("Location: detalles.php?id={$id}");
    exit;
}

// Número de items en carrito
$cantidad_items = array_sum(array_column($_SESSION['carrito'], 'cantidad'));

// Mensaje flash
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : null;
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Detalles - <?= htmlspecialchars($product['nombre']) ?></title>
    <style>
        :root{
            --primary1:#e539f0;
            --accent: #667eea;
            --muted:#6b6f76;
            --card-bg: #fff;
            --radius:12px;
        }
        *{box-sizing:border-box}
        body{
            font-family: Inter, Roboto, "Segoe UI", system-ui, Arial;
            background:#f5f7fb;
            margin:0;
            color:#222;
            padding:20px;
        }
        .container{
            max-width:1200px;
            margin:0 auto;
        }

        /* Header simple con carrito */
        header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:18px;
        }
        .brand{font-weight:800; font-size:1.2rem; display:flex; align-items:center; gap:8px}
        .brand span{background:linear-gradient(45deg,var(--accent),#764ba2); -webkit-background-clip:text; color:transparent; font-size:1.4rem}
        .cart-summary{
            background:#fff; padding:8px 12px; border-radius:999px; box-shadow:0 6px 18px rgba(20,20,40,0.06);
            display:flex; gap:10px; align-items:center; font-size:0.95rem;
        }

        /* Layout principal similar a la imagen */
        .detalle-grid{
            display:grid;
            grid-template-columns: 80px 1fr 360px;
            gap:20px;
            align-items:start;
        }

        /* Thumbnails verticales */
        .thumbs{
            display:flex;
            flex-direction:column;
            gap:12px;
        }
        .thumb{
            width:72px;
            height:72px;
            border-radius:8px;
            overflow:hidden;
            border:2px solid transparent;
            cursor:pointer;
            background:#fff;
            box-shadow:0 6px 18px rgba(0,0,0,0.06);
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .thumb img{width:100%; height:100%; object-fit:cover}

        .thumb.active{border-color:var(--accent)}

        /* Imagen principal */
        .main-image{
            background:var(--card-bg);
            border-radius:var(--radius);
            padding:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:0 12px 40px rgba(16,24,40,0.06);
        }
        .main-image img{
            width:100%;
            max-height:520px;
            object-fit:contain;
            border-radius:8px;
        }

        /* Sidebar de compra */
        .sidebar{
            background:var(--card-bg);
            border-radius:var(--radius);
            padding:20px;
            box-shadow:0 12px 40px rgba(16,24,40,0.06);
            position:sticky;
            top:24px;
            height:fit-content;
        }

        .title{font-size:1.25rem; font-weight:700; margin-bottom:6px}
        .marca{color:var(--muted); font-weight:600; margin-bottom:12px}
        .sku{font-size:0.85rem; color:#9aa0a6; margin-bottom:12px}

        .price-row{display:flex; align-items:baseline; gap:12px; margin-bottom:14px}
        .price{font-size:1.6rem; font-weight:800; color:#e53935}
        .old-price{font-size:0.95rem; color:#9aa0a6; text-decoration:line-through}

        .rating{display:flex; gap:8px; align-items:center; margin-bottom:16px}
        .stars{color:#f5c518; font-size:1.05rem}
        .rating-num{background:#f4f6f9; padding:4px 8px; border-radius:8px; font-weight:600; color:#374151}

        .specs{margin:16px 0; padding:12px; background:#fbfdff; border-radius:8px; font-size:0.95rem}
        .specs li{padding:6px 0; color:#4b5563}

        .cta{display:flex; gap:10px; margin-top:12px}
        .btn{
            flex:1;
            border:0;
            padding:12px 14px;
            border-radius:10px;
            font-weight:700;
            cursor:pointer;
            font-size:0.95rem;
        }
        .btn-buy{background:linear-gradient(45deg,var(--accent),#764ba2); color:#fff}
        .btn-wishlist{background:transparent; border:2px solid #e6e9f2; color:#444}

        /* quantity */
        .qty{
            display:flex;
            gap:8px;
            align-items:center;
            margin-bottom:8px;
        }
        .qty input[type="number"]{
            width:70px;
            padding:8px;
            border-radius:8px;
            border:1px solid #e6e9f2;
            text-align:center;
            font-weight:700;
        }

        /* pequeño info abajo */
        .info-row{margin-top:14px; font-size:0.9rem; color:#586069}

        /* responsive */
        @media (max-width: 980px){
            .detalle-grid{grid-template-columns: 72px 1fr; grid-auto-rows:auto}
            .sidebar{grid-column:1/ -1; position:relative; top:0}
        }
        @media (max-width:600px){
            header{flex-direction:column; gap:10px; align-items:flex-start}
            .thumb{width:60px;height:60px}
        }

        /* mensaje flash */
        .flash{background:#e6ffef; border-left:4px solid #00b894; padding:12px 14px; border-radius:8px; margin-bottom:14px}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="brand"><span>⚡</span> TechStore</div>
            <div class="cart-summary">
                🛒 <?= $cantidad_items ?> &nbsp; | &nbsp; Total: 
                <?php
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $it) $total += $it['precio'] * $it['cantidad'];
                    echo '<strong>' . formatearPrecio($total) . '</strong>';
                ?>
            </div>
        </header>

        <?php if ($mensaje): ?>
            <div class="flash"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <!-- Layout: thumbs | main image | sidebar -->
        <section class="detalle-grid">
            <!-- Thumbs -->
            <div class="thumbs" aria-hidden="false">
                <?php foreach ($product['galeria'] as $i => $img): ?>
                    <div class="thumb <?= $i === 0 ? 'active' : '' ?>" data-src="<?= $img ?>">
                        <img src="<?= $img ?>" alt="Miniatura <?= $i+1 ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Imagen principal -->
            <div class="main-image">
                <img id="mainImg" src="<?= htmlspecialchars($product['imagen']) ?>" alt="<?= htmlspecialchars($product['nombre']) ?>">
            </div>

            <!-- Sidebar compra -->
            <aside class="sidebar" aria-labelledby="productTitle">
                <div id="productTitle" class="title"><?= htmlspecialchars($product['nombre']) ?></div>
                <div class="marca">Marca: <?= htmlspecialchars($product['marca']) ?></div>
                <div class="sku">Código: <?= htmlspecialchars($product['codigo']) ?></div>

                <div class="price-row">
                    <div class="price"><?= formatearPrecio($product['precio']) ?></div>
                    <!-- simulamos un precio anterior para efecto -->
                    <div class="old-price"><?= formatearPrecio(intval($product['precio'] * 1.25)) ?></div>
                </div>

                <div class="rating">
                    <div class="stars"><?= generarEstrellas($product['valoracion']) ?></div>
                    <div class="rating-num"><?= number_format($product['valoracion'], 1) ?></div>
                </div>

                <ul class="specs" aria-label="Características">
                    <?php foreach ($product['caracteristicas'] as $c): ?>
                        <li>• <?= htmlspecialchars($c) ?></li>
                    <?php endforeach; ?>
                </ul>

                <form method="post" class="purchase-form">
                    <input type="hidden" name="producto_id" value="<?= $id ?>">
                    <div class="qty">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" type="number" min="1" value="1" />
                    </div>

                    <div class="cta">
                        <button name="agregar_producto" class="btn btn-buy" type="submit">🛒 Agregar al carrito</button>
                        <button type="button" class="btn btn-wishlist" onclick="alert('Añadido a favoritos (demo)')">♥ Favoritos</button>
                    </div>
                </form>

                <div class="info-row">
                    <div>Envío: <strong>Gratis</strong></div>
                    <div>Garantía: <strong>1 año</strong></div>
                </div>
            </aside>
        </section>

        <!-- Información adicional / descripción -->
        <section style="margin-top:20px; background:#fff; padding:18px; border-radius:10px; box-shadow:0 8px 18px rgba(10,10,30,0.04)">
            <h3 style="margin-bottom:10px">Descripción</h3>
            <p style="color:#4b5563; line-height:1.5">
                Ultrabook compacto de 14" pensado para productividad y movilidad. Procesador Intel Core i7 de última generación,
                16GB de RAM y 512GB SSD para arrancar rápido y manejar múltiples tareas. Conectividad moderna (Wi-Fi 6, Thunderbolt)
                y pantalla Full HD para gran nitidez.
            </p>
            <strong style="display:block; margin-top:12px">Especificaciones técnicas</strong>
            <ul style="color:#4b5563; margin-top:8px">
                <li>Dimensiones: 320 x 210 x 14 mm</li>
                <li>Peso aproximado: 1.25 kg</li>
                <li>Sistema operativo: Windows 11 Home</li>
            </ul>
        </section>
    </div>

    <script>
        // Simple script para cambiar imagen principal al click en thumb
        document.querySelectorAll('.thumb').forEach(function(t){
            t.addEventListener('click', function(){
                document.querySelectorAll('.thumb').forEach(x=>x.classList.remove('active'));
                t.classList.add('active');
                var src = t.getAttribute('data-src');
                document.getElementById('mainImg').setAttribute('src', src);
            });
        });
    </script>
</body>
</html>
