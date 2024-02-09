
@extends('adminlte::page')

@section('title', 'Tienda')

@section('content_header')
    <h1>Categoria</h1>
@stop



@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categoria.create') }}"> 
                <i class="fas fa-plus"></i> Nueva categoria
            </a>
        </div>
    </div>
</div>
<br>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estatus</th>
            <th scope="col" width="180px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categoria as $cate)
        <tr>
            <td>{{ $cate->id }}</td>
            <td>{{ $cate->nombre }}</td>
            <td>{{ $cate->descripcion }}</td>
            <td>{{ $cate->estatus }}</td>
            <td>
                <div class="btn-group" role="group">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('categoria.edit', $cate->id) }}">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('categoria.destroy', $cate->id) }}" method="POST" id="deleteForm{{$cate->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $cate->id }})">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('js')
<script>
    function confirmDelete(categoriaId) {
        if (confirm("¿Estás seguro de borrar la información?")) {
            document.getElementById('deleteForm' + categoriaId).submit();
        }
    }
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop