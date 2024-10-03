@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center mb-4">Crear Producto</h1>

                <!-- Mostrar errores de validación -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario para crear un producto -->
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre') }}" placeholder="Ingresa el nombre del producto">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
                            placeholder="Escribe una descripción">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio"
                            name="precio" step="0.001" value="{{ old('precio') }}"
                            placeholder="Ingresa el precio en S/.">
                        @error('precio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio"
                            name="precio" step="0.001" value="{{ old('precio') }}"
                            placeholder="Ingresa el precio en S/.">
                        @error('precio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad en Stock:</label>
                        <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad"
                            name="cantidad" value="{{ old('cantidad') }}" placeholder="Ingresa la cantidad disponible">
                        @error('cantidad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Guardar Producto</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al listado</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const precioInput = document.getElementById('precio');

            precioInput.addEventListener('input', function(e) {
                // Limitar a 3 decimales
                const value = e.target.value;
                const parts = value.split('.');
                if (parts.length > 2) {
                    // Si hay más de un punto decimal, se quita todo después del segundo
                    e.target.value = parts[0] + '.' + parts[1];
                } else if (parts.length === 2 && parts[1].length > 3) {
                    // Si hay más de 3 decimales, se recorta el valor
                    e.target.value = parts[0] + '.' + parts[1].slice(0, 3);
                }
            });
        });
    </script>
@endsection
