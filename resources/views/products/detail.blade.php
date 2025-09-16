
@extends('layouts.app')


@section('content')
     <div class="container">
        <header>
            <div class="brand"><span>⚡</span> TechStore</div>
            <div class="cart-summary">
                🛒 <?= $cantidad_items ?> &nbsp; | &nbsp; Total: 
            </div>
        </header>

      +

        <!-- Layout: thumbs | main image | sidebar -->
        <section class="detalle-grid">
            <!-- Thumbs -->
            <div class="thumbs" aria-hidden="false">
               
                    <div class="thumb <?= $i === 0 ? 'active' : '' ?>" data-src="<?= $img ?>">
                        <img src="<?= $img ?>" alt="Miniatura <?= $i+1 ?>">
                    </div>

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


@endsection
