<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Función para listar los productos
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();
        // Pasar los productos a la vista
        return view('productos.index', compact('productos'));
    }

    // Función para mostrar el formulario de creación (CREATE - create)
    public function create()
    {
        return view('productos.create'); // Retornar la vista para crear un nuevo producto
    }

    // Función para almacenar el nuevo producto en la base de datos (CREATE - store)
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,3})?$/', // Limitar a 3 decimales,
            'cantidad' => 'required|integer|min:0',
        ]);

        // Crear un nuevo producto
        Producto::create($request->all());

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }


    // Función para mostrar un producto específico (READ - show)
    public function show(string $id)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
        // Mostrar la vista con el producto
        return view('productos.show', compact('producto'));
    }


    // Función para mostrar el formulario de edición de un producto (UPDATE - edit)
    public function edit(string $id)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
        // Retornar la vista de edición con los datos del producto
        return view('productos.edit', compact('producto'));
    }


    // Función para actualizar un producto en la base de datos (UPDATE - update)
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
        ]);

        // Buscar el producto por su ID y actualizar sus datos
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }


    // Función para eliminar un producto de la base de datos (DELETE - destroy)
    public function destroy(string $id)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
        $producto->delete(); // Eliminar el producto

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}