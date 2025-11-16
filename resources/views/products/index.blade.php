@extends('layouts.app')

@section('content')
    <h1 class="display-5 fw-bold mb-2">Productos de Tecnología</h1>
    <h2 class="text-muted mb-0">Explora nuestra selección de productos disponibles</h2>
    <div class="container py-5 products-page">

        {{-- Filtros de categoría --}}
        <div class="text-center mb-4">
            <a href="{{ route('products.index') }}"
                class="btn btn-outline-secondary btn-sm mx-1 mb-2 {{ !$selectedCategory ? 'active' : '' }}">
                Todos
            </a>

            @foreach ($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->id]) }}"
                    class="btn btn-outline-secondary btn-sm mx-1 mb-2 {{ $selectedCategory == $category->id ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        {{-- Listado de productos --}}
        @if ($products->count())
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm product-card bg-dark text-white">

                            {{-- Imagen --}}
                            <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500"
                                class="card-img-top" alt="Imagen de {{ $product->name }}">

                            <div class="card-body d-flex flex-column"
                                style="background: white; color: black; border-radius: 0 0 12px 12px;">

                                {{-- Nombre --}}
                                <h5 class="card-title mb-2 text-truncate" style="color: black;">
                                    {{ $product->name }}
                                </h5>

                                {{-- Categoría y marca --}}
                                <p class="mb-1 small product-meta" style="color: black;">
                                    <strong style="color: black;">Categoría:</strong> {{ $product->category->name }}
                                </p>

                                <p class="mb-2 small product-meta" style="color: black;">
                                    <strong style="color: black;">Marca:</strong> {{ $product->brand->name }}
                                </p>

                                {{-- Descripción --}}
                                <p class="card-text flex-grow-1 small product-description" style="color: black;">
                                    {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                                </p>

                                {{-- Precio + botón --}}
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="fw-bold fs-6 text-price" style="color: #007bff;">
                                        $ {{ number_format($product->price, 0, ',', '.') }}
                                    </span>

                                    <a href="#" class="btn btn-sm btn-primary">
                                        Agregar al carrito
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center text-muted py-5">
                <h5>No hay productos disponibles en esta categoría.</h5>
            </div>
        @endif

    </div>
@endsection
