@extends(`layout.main`)
@section('contenido')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ $product->Description }}">
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('products.lista') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
