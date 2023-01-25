@extends('layouts.app')

@section("titulo")
ACTIVITIES
@endsection

@section("content")

    <div class="container py-5">
        <div class="row">
            <div class="col-9">
                    <h3>Listado de usuarios</h3>
            </div>
        </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
             @endif
        <div class="row justify-content-center mt-2">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Correo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ implode(' ', [$user->name, $user->first_name, $user->last_name]) }}</td>
                                <td>{{ $user->enrolment }}</td>
                                <td>{{ $user->email }}</td>
                                <td>eliminar - editar</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->appends(['sort' => 'name'])->links() }}
            </div>
        </div>
    </div>

@endsection
