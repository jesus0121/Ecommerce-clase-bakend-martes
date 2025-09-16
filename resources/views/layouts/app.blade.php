<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
  <style>
    /* ===== Reset y variables ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary: #667eea;
      --secondary: #764ba2;
      --danger: #ff6b6b;
      --success: #00b894;
      --muted: #6b6f76;
      --text-dark: #2d3436;
      --radius: 12px;
    }

    body {
      font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      min-height: 100vh;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* ===== Navbar ===== */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #000;
      padding: 15px 40px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar .logo {
      font-size: 1.6rem;
      font-weight: bold;
      letter-spacing: 2px;
      color: #00f7ff;
      cursor: pointer;
      transition: color 0.3s ease-in-out;
    }

    .navbar .logo:hover {
      color: #fff;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    .nav-links a {
      text-decoration: none;
      color: #ddd;
      font-size: 1rem;
      font-weight: 500;
      transition: color 0.3s ease, transform 0.2s ease;
      position: relative;
    }

    .nav-links a:hover {
      color: #00f7ff;
      transform: translateY(-2px);
    }

    .nav-links a::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      background: #00f7ff;
      left: 0;
      bottom: -6px;
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* ===== Hero ===== */
    .hero-section {
      text-align: center;
      margin: 60px 0;
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
    }

    /* ===== Tarjetas de producto ===== */
    .lista-productos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px;
      margin-bottom: 60px;
    }

    .tarjeta-producto {
      background: rgba(255, 255, 255, 0.95);
      border-radius: var(--radius);
      overflow: hidden;
      transition: all 0.3s ease;
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
      background: linear-gradient(90deg, var(--primary), var(--secondary));
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
      background: linear-gradient(45deg, var(--danger), #ee5a52);
      color: white;
      padding: 8px 16px;
      border-radius: 25px;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .producto-content {
      padding: 25px;
    }

    .producto-header h2 {
      font-size: 1.4rem;
      margin-bottom: 8px;
      color: var(--text-dark);
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
    }

    .puntuacion {
      background: #f8f9fa;
      padding: 4px 8px;
      border-radius: 12px;
      font-size: 0.85rem;
      color: #6c757d;
    }

    .btn {
      flex: 1;
      padding: 12px 20px;
      border: none;
      border-radius: var(--radius);
      cursor: pointer;
      font-weight: 600;
      text-align: center;
      transition: all 0.3s ease;
      display: inline-block;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .btn-primary {
      background: linear-gradient(45deg, var(--primary), var(--secondary));
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }

    /* ===== Footer ===== */
    footer {
      background: rgba(0, 0, 0, 0.8);
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
      color: var(--primary);
    }

    .footer-section a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
    }

    .footer-section a:hover {
      color: var(--primary);
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }

      .lista-productos {
        grid-template-columns: 1fr;
      }

      .nav-links {
        flex-direction: column;
        gap: 15px;
        margin-top: 15px;
      }
    }
  </style>

</head>

<body>
    @include('layouts.navbar')

    @yield('content')


    @include('layouts.footer')
</body>

</html>
