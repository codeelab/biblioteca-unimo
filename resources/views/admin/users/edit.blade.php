@extends("theme.$theme.layout")

@section("titulo")
TEST
@endsection

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
             @endif
        </div>
    </div>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($activitie->imagen) }}" alt="{{$activitie->titulo}}"></div>
            <div class="col-md-6">
                <h1 class="display-6 fw-bolder">{{$activitie->titulo}}</h1>
                <div class="fs-5">
                    Precio por persona: $<span class="cost">{{$activitie->precio }}</span>
                </div>
                <div class="fs-5 number-input amount">
                    <span>Cantidad de personas: </span><br>
                     <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="decrease"></button>
                        <input class="quantity" id="quantity" min="1" placeholder="1" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" id="increment"></button>
                </div>
                <div class="fs-5">
                    Precio total: $<span class="total"></span>
                </div>
                <p class="lead mt-3">Viaje de ida y regreso a playa Varadero que incluye una merienda por persona.</p>
                <div class="d-flex">
                    <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf
                        <input type="hidden" name="activitie_id" value="{{$activitie->id}}">
                        <input type="hidden" id="num_people" name="num_people" value="{{ ' ' ? '1' : app('request')->input('number_people') }}">
                        <input type="hidden" name="price_total" value="{{$activitie->precio}}">
                        <input type="hidden" name="date_book" value="{{$activitie->date_start}}">
                        <button type="submit" class="btn btn-outline-dark flex-shrink-0">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection