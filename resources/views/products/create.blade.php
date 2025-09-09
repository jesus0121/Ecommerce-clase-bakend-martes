<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Producto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .form-container {
      background: white;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      width: 400px;
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input, select, textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    textarea {
      resize: vertical;
      height: 80px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
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
</body>
</html>
