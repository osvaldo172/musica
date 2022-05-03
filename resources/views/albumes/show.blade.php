@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Albumes</h1>
                <a href="{{route('albumes.create')}}" type="button" class="btn btn-primary">Crear cancion</a>
            </div>

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($albumes as $index => $album)
                        <tr>
                            <th scope="row">{{$album->id}}</th>
                            <td>{{$album->nombre}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('albumes.show', $album) }}" type="button" class="btn btn-success m-custom">Editar</a>
                                    <form method="POST" action="{{ route('albumes.destroy', $album) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="2">
                                Sin albumes registrados
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
