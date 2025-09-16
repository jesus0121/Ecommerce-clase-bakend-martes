@extends('layouts.app')


@section('content')
    <section aria-label="Listado de productos" class="lista-productos">
        <article class="tarjeta-producto">
            <div class="producto-imagen">
                <img src="" alt="" />
                <div class="precio-badge"></div>
            </div>
            <div class="producto-content">
                <header class="producto-header">
                    <h2></h2>
                    <p class="marca">🏷️ </p>
                </header>
                <div class="valoracion">
                    <span class="estrellas"></span>
                    <span class="puntuacion"></span>
                </div>
                <ul class="caracteristicas">

                </ul>
                <nav class="producto-actions">
                    <a href="#producto-" class="btn btn-secondary">👁️ Ver detalles</a>
                    <form method="post">
                        <input type="hidden" name="producto_id" value="100">
                        <input type="hidden" name="producto_nombre" value="Teclado Gamer">
                        <input type="hidden" name="producto_precio" value="200.000">
                        <button type="submit" name="agregar_producto" class="btn btn-primary">
                            🛒 Agregar
                        </button>
                    </form>
                </nav>
            </div>
        </article>
        <article class="tarjeta-producto">
            <div class="producto-imagen">
                <img src="" alt="" />
                <div class="precio-badge"></div>
            </div>
            <div class="producto-content">
                <header class="producto-header">
                    <h2></h2>
                    <p class="marca">🏷️ </p>
                </header>
                <div class="valoracion">
                    <span class="estrellas"></span>
                    <span class="puntuacion"></span>
                </div>
                <ul class="caracteristicas">

                </ul>
                <nav class="producto-actions">
                    <a href="#producto-" class="btn btn-secondary">👁️ Ver detalles</a>
                    <form method="post">
                        <input type="hidden" name="producto_id" value="">
                        <input type="hidden" name="producto_nombre" value="">
                        <input type="hidden" name="producto_precio" value="">
                        <button type="submit" name="agregar_producto" class="btn btn-primary">
                            🛒 Agregar
                        </button>
                    </form>
                </nav>
            </div>
        </article>
        <article class="tarjeta-producto">
            <div class="producto-imagen">
                <img src="" alt="" />
                <div class="precio-badge"></div>
            </div>
            <div class="producto-content">
                <header class="producto-header">
                    <h2></h2>
                    <p class="marca">🏷️ </p>
                </header>
                <div class="valoracion">
                    <span class="estrellas"></span>
                    <span class="puntuacion"></span>
                </div>
                <ul class="caracteristicas">

                </ul>
                <nav class="producto-actions">
                    <a href="#producto-" class="btn btn-secondary">👁️ Ver detalles</a>
                    <form method="post">
                        <input type="hidden" name="producto_id" value="">
                        <input type="hidden" name="producto_nombre" value="">
                        <input type="hidden" name="producto_precio" value="">
                        <button type="submit" name="agregar_producto" class="btn btn-primary">
                            🛒 Agregar
                        </button>
                    </form>
                </nav>
            </div>
        </article>
    </section>
@endsection
