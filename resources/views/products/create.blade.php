@extends('admin.layouts.app')

@section('content')
    <h1>Registrar Producto</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.products.store')}}" method="POST">
                @csrf
                
                <!-- Nombre Producto -->
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{old('name')}}">
                </div>
                <!-- Descripción Producto -->
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="productDescription" rows="3" name="description">{{old('description')}}</textarea>
                </div>
                <!-- Precio Producto -->
                 @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price" value="{{old('price')}}">
                </div>
                <!-- Categoría Producto -->
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select class="form-control" id="productCategory" name="category">
                        <option selected disabled>-- Category --</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>
                <!-- Marca Producto -->
                @error('brand')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select class="form-control" id="productBrand" name="brand">
                        <option selected disabled>-- Brand --</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
