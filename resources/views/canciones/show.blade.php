@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Canciones</h1>
                <a href="{{route('canciones.create')}}" type="button" class="btn btn-primary">Crear cancion</a>
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
                    @forelse($canciones as $cancion)
                        <tr>
                            <th scope="row">{{$cancion->id}}</th>
                            <td>{{$cancion->nombre}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('canciones.show', $cancion) }}" type="button" class="btn btn-success m-custom">Editar</a>
                                    <form method="POST" action="{{ route('canciones.destroy', $cancion) }}">
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
                            <td>
                                Sin canciones registrados
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
