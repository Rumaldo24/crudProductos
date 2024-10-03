@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center mb-4">Listado de Productos</h1>
                <div class="text-right mb-3">
                    <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
                </div>

                @if ($productos->isEmpty())
                    <div class="alert alert-warning text-center">
                        <p>No hay productos disponibles.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>S/ {{ number_format($producto->precio, 3) }}</td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td>
                                            <a href="{{ route('productos.show', $producto->id) }}"
                                                class="btn btn-info btn-sm mb-1" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('productos.edit', $producto->id) }}"
                                                class="btn btn-warning btn-sm mb-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mb-1" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
