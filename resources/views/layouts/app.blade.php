<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
  <style>
   /* === ESTILOS GENERALES === */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: #f8f8f8;
  color: #333;
}

h1, h2, h3 {
  margin: 0;
}

/* === NAVBAR === */
nav {
  background: #000;
  padding: 15px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
}

nav .logo {
  font-size: 20px;
  font-weight: bold;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 20px;
  margin: 0;
  padding: 0;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 15px;
  transition: color 0.3s ease;
}

nav ul li a:hover {
  color: #00b4d8;
}

/* === FOOTER === */
footer {
  background: #222;
  color: #fff;
  text-align: center;
  padding: 20px;
  margin-top: 40px;
}

footer a {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
  transition: color 0.3s ease;
}

footer a:hover {
  color: #00b4d8;
}

/* === LISTA DE PRODUCTOS === */
.products-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.product-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  padding: 15px;
  text-align: center;
  transition: transform 0.2s ease;
}

.product-card:hover {
  transform: translateY(-5px);
}

.product-card img {
  max-width: 100%;
  border-radius: 8px;
  margin-bottom: 10px;
}

.product-card h2 {
  font-size: 18px;
  margin: 10px 0 5px;
}

.product-card .brand {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

.product-card .price {
  font-size: 18px;
  color: #e63946;
  font-weight: bold;
  margin-bottom: 15px;
}

.btn {
  display: inline-block;
  padding: 10px 15px;
  background: #0077b6;
  color: #fff;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 14px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.btn:hover {
  background: #023e8a;
}

/* === DETALLES DEL PRODUCTO === */
.container {
  max-width: 1100px;
  margin: 40px auto;
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.product-image {
  flex: 1 1 350px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.product-image img {
  max-width: 100%;
  border-radius: 10px;
}

.product-details {
  flex: 1 1 500px;
}

.product-details h1 {
  font-size: 28px;
  margin-bottom: 10px;
}

.product-details .brand {
  font-size: 16px;
  color: #555;
  margin-bottom: 15px;
}

.product-details .price {
  font-size: 24px;
  color: #e63946;
  font-weight: bold;
  margin-bottom: 20px;
}

.product-details .description {
  font-size: 16px;
  color: #333;
  line-height: 1.5;
  margin-bottom: 25px;
}

/* === FORMULARIO DE PRODUCTOS === */
.form-container {
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  max-width: 500px;
  width: 100%;
  margin: 40px auto;
}

.form-container h1 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

label {
  display: block;
  margin: 10px 0 5px;
  font-weight: bold;
  color: #444;
}

input, textarea, select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 14px;
}

textarea {
  resize: vertical;
  min-height: 80px;
}

.form-container .btn {
  width: 100%;
  padding: 12px;
  font-size: 16px;
  margin-top: 15px;
}

/* Enlaces dentro del navbar */
nav a {
  color: #fff;            /* Blanco */
  text-decoration: none;  /* Quitar subrayado */
}

nav a:visited {
  color: #fff;            /* Evitar morado en enlaces visitados */
}

nav a:hover {
  color: #ff9800;         /* Color al pasar el mouse */
}

  </style>

</head>

<body>
    @include('layouts.navbar')

    @yield('content')


    @include('layouts.footer')
</body>

</html>
