

@extends('adminlte::page')

@section('title', 'Tienda')

@section('content_header')
    <h1>Categoria</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-purple text-white text-center">
                    <h2 class="mb-0">Crear una nueva categoría</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="nombre" class="text-purple">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" />
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="text-purple">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="estatus" name="estatus" value="1" checked>
                                <label class="form-check-label" for="estatus">
                                    Activo
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple btn-block">
                            <i class="fas fa-save mr-2"></i> Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop






 