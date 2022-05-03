@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Grupos</h1>

                <a href="{{route('grupos.create')}}" type="button" class="btn btn-primary">Crear grupo</a>
            </div>

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($grupos as $grupo)
                        <tr>
                            <th scope="row">{{$grupo->id}}</th>
                            <td>{{$grupo->nombre}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('grupos.show', $grupo) }}" type="button" class="btn btn-success m-custom">Editar</a>
                                    <form method="POST" action="{{ route('grupos.destroy', $grupo) }}">
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
                                Sin grupos registrados
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
