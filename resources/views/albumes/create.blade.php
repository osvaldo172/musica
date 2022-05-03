@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Nuevo Album
            </div>
            <div class="card-body">
                <form @isset($album->id) action="{{ route('albumes.update', $album) }}" @else action="{{ route('albumes.store') }}" @endisset method="POST">
                    @isset($album->id)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ @$album->nombre }}">
                    </div>

                    @foreach($canciones as $cancion)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$cancion->id}}" id="cancion-{{$cancion->id}}" name="canciones[]"
                                @if(isset($album->id) && $album->canciones->contains($cancion->id)) checked @endif
                            >
                            <label class="form-check-label" for="cancion-{{$cancion->id}}">
                                {{$cancion->nombre}}
                            </label>
                        </div>
                    @endforeach

                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        <a href="{{ route('albumes.index') }}" type="submit" class="btn btn-danger mb-3">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
