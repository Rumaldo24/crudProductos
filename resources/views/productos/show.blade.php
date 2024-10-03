@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center mb-4">Detalles del Producto</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información del Producto</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $producto->id }}</p>
                        <p class="card-text"><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                        <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> S/ {{ number_format($producto->precio, 2) }}</p>
                        <p class="card-text"><strong>Cantidad:</strong> {{ $producto->cantidad }}</p>
                        <p class="card-text"><strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i:s') }}</p>
                        <p class="card-text"><strong>Actualizado:</strong>
                            {{ $producto->updated_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver al listado</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar Producto</a>
                </div>
            </div>
        </div>
    </div>
@endsection
