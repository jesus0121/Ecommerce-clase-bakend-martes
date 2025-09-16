@extends('layouts.app')

@section('content')
<body>
  <div class="form-container">
    <h1>Registrar Producto</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
      
      <label for="nombre">Nombre del producto</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ej: Smartphone Pro 128GB" required>
      
      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 2200000" required>
      
      <label for="descripcion">Descripción</label>
      <textarea id="descripcion" name="descripcion" placeholder="Escribe una breve descripción del producto..." required></textarea>
      
      <label for="imagen">Imagen del producto</label>
      <input type="file" id="imagen" name="imagen" accept="image/*" required>
      
      <label for="marca">Marca</label>
      <input type="text" id="marca" name="marca" placeholder="Ej: NovaTech" required>
      
      <label for="categoria">Categoría</label>
      <select id="categoria" name="categoria" required>
        <option value="">-- Selecciona una categoría --</option>
        <option value="laptops">Laptops</option>
        <option value="smartphones">Smartphones</option>
        <option value="smartwatch">Smartwatches</option>
        <option value="audio">Audio</option>
        <option value="camaras">Cámaras</option>
        <option value="consolas">Consolas</option>
      </select>
      
      <button type="submit" class="btn">Guardar Producto</button>
    </form>
  </div>
</body>
@endsection
