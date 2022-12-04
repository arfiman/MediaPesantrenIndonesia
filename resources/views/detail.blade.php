@extends('layouts.app')

@section('content')
    <div class="content-bg">
        <div class="container py-4">
            <h2>Pesantren ABC</h2>
        </div>
    </div>

    <div class="content-bg-2">
        <div class="container mx-auto py-5 row">
            <div class="col-sm-12 col-md-8 pe-5">
                <!-- Carousel -->
                <div id="carouselFotoPesantren" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for ($i=1; $i<=count($foto); $i++)
                            <button type="button" data-bs-target="#carouselFotoPesantren" data-bs-slide-to="{{$i-1}}"
                            class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
                        @endfor

                    </div>
                    <div class="carousel-inner">
                        @empty($foto[0])
                            <div class="carousel-item active">
                                <img src="{{ url('images/santri.jpg') }}"
                                    class="img d-block" height="500" alt="...">
                            </div>
                        @endempty
                        @isset($foto[0])
                            @foreach ($foto as $f)
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $f->img) }}"
                                        class="img d-block" height="500" alt="...">
                                </div>
                            @endforeach
                        @endisset

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFotoPesantren"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselFotoPesantren"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <!-- Description -->
                <h3>Informasi Pesantren</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span><b>Nama Pesantren : </b></span>
                        <span>{{$pesantren->nama}}</span>
                    </li>
                    <li class="list-group-item">
                        <span><b>Provinsi : </b></span>
                        <span>{{$pesantren->name}}</span>
                    </li>
                    <li class="list-group-item">
                        <span><b>Potensi : </b></span>
                        {{-- <span>Peternakan, Perkebunan, Perikanan</span> --}}
                        <ul>
                            @foreach ($potensi as $pot)
                            <li>{{$pot->name}}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
