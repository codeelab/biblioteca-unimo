@extends('layouts.admin')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col">

            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>



                <div class="card-body">
                    <h4> Bienvenido, {{ Auth::user()->name }} {{ Auth::user()->first_name }}</h4>
                </div>

            </div>

        </div>

        <div class="col">
            <div class="card">
                <h5 class="card-header">MEDICAPANAMERICANA</h5>
                <div class="card-body">
                    <div class="d-grid gap-2">
                    <a href="https://www.medicapanamericana.com/digital/ebooks/buscador" target="_blank" ><button class="btn btn-outline-primary" type="button">ENTRAR</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
