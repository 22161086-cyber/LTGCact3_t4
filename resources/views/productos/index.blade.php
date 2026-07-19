<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📦 Control de Productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-success">+ Agregar Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th class="text-center">Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                          <tr>
                <td class="text-center">{{ $producto->id }}</td>
                <td><strong>{{ $producto->nombre }}</strong></td>
                <td class="text-center">
                    <span class="badge bg-secondary">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</span>
                </td>
                <td>{{ $producto->descripcion ?? 'Sin descripción' }}</td>
                <td class="text-center">${{ number_format($producto->precio, 2) }}</td>
                <td class="text-center">
                    <span class="badge {{ $producto->stock > 0 ? 'bg-info' : 'bg-danger' }}">
                        {{ $producto->stock }} pz
                    </span>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No hay productos registrados aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
    {{ $productos->links('pagination::bootstrap-5') }}
</div>
</body>
</html>