@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1>Form product create </h1>
        <form action="" method="post">
            <input type="text">
        </form>
        <h2>Formulario de Producto</h2>
        <form action="procesar_producto.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="id">ID del producto</label>
                <input type="number" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria" required>
                    <option value="">Seleccione una categoría</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="hogar">Hogar</option>
                    <option value="ropa">Ropa</option>
                    <option value="alimentos">Alimentos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen del producto</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
            </div>

            <button type="submit">Guardar Producto</button>
        </form>
    </div>
@endsection
