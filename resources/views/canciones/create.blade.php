@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Nueva Canción
            </div>
            <div class="card-body">
                <form @isset($cancion->id) action="{{ route('canciones.update', $cancion) }}" @else action="{{ route('canciones.store') }}" @endisset method="POST">
                    @isset($cancion->id)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ @$cancion->nombre }}">
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="grupo_id">
                        <option selected>Selecciona un grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}" @if(isset($cancion) && $grupo->id == $cancion->grupo_id) selected @endif>{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        <a href="{{ route('canciones.index') }}" type="submit" class="btn btn-danger mb-3">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
