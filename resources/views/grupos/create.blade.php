@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Nuevo Grupo
            </div>
            <div class="card-body">
                <form @isset($grupo->id) action="{{ route('grupos.update', $grupo) }}" @else action="{{ route('grupos.store') }}" @endisset method="POST">
                    @isset($grupo->id)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ @$grupo->nombre }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        <a href="{{ route('grupos.index') }}" type="submit" class="btn btn-danger mb-3">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
