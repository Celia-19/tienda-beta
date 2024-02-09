

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
                    <h2 class="mb-0">Editar categoría</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('categoria.update', $categoria->id) }}" method="post" enctype="multipart/form-data">
                        @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
                        @method('PUT')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Id</label>
                            <input type="number" name="id" id="id" class="form-control" value="{{$categoria->id}}" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tipo"  value="{{$categoria->nombre}}">
                            <div class="valid-feedback">
                                Se ve bien!
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <input type="text" class="form-control mb-3" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$categoria->descripcion}}" >
                            <div class="valid-feedback">
                                Se ve bien!
                            </div>
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
                            <i class="fas fa-save"></i> Guardar
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






 