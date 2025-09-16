
@extends('layouts.app')


@section('content')

<body>
  <div class="container">
    <!-- Imagen del producto -->
    <div class="product-image">
      <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=800" alt="Laptop Ultrabook 14 i7">
    </div>

    <!-- Detalles del producto -->
    <div class="product-details">
      <h1>Ultrabook 14" i7 16GB/512GB</h1>
      <p class="brand">Marca: <strong>NovaTech</strong></p>
      <p class="price">$3,999,000 COP</p>
      <p class="description">
        La Ultrabook NovaTech de 14 pulgadas combina rendimiento y diseño elegante. 
        Equipada con un procesador Intel Core i7 de última generación, 
        16GB de memoria RAM y un SSD de 512GB para velocidad y eficiencia. 
        Ideal para profesionales, estudiantes y amantes de la tecnología.
      </p>
      <a href="#" class="btn">Agregar al carrito</a>
    </div>
  </div>
</body>

@endsection
