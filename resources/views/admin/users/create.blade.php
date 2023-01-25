@extends('layouts.app')

@section("titulo")
INICIO
@endsection

@section("content")

        <div class="container px-5 px-lg my-5">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
             @endif
            <form method="POST" action="{{ route('crear') }}" autocomplete="off">
                @csrf
                <div class="form-group mt-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" value="{{old('name')}}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Apellido Paterno" value="{{old('first_name')}}">
                    @error('first_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellido Materno" value="{{old('last_name')}}">
                    @error('last_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="enrolment">Matrícula</label>
                    <input type="text" name="enrolment" id="enrolment" class="form-control @error('enrolment') is-invalid @enderror" placeholder="Matrícula" value="{{old('enrolment')}}">
                    @error('enrolment')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="email">Correo Institucional</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="@unimontrer.edu.mx" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" value="{{old('password')}}">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="type" id="type" value="0">
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>

@endsection
