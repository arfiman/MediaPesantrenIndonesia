@extends('layouts.app')

@section('content')
    <div class="overview-bg" style="height: 90vh; padding-top: 6%;">
        <div id="landing-welcome" class="container row mx-auto justify-content-center text-white">
            <div class="col-md-5">
                <h1 class="py-3"><b>Connecting Pesantren <span> with the world</b></span> </h1>
                <p class="caption text-grey">
                    <b>Temukan dan kembangkan potensi pesantren yang kamu inginkan di sini</b>
                </p>

                <div class="pt-4">
                    <a class="btn btn-warning" href="/pesantren">Temukan Pesantren Sekarang!</a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 text-center py-3 mx-auto">
                <img class="" src="{{ url('images/santri.jpg') }}"
                    style="height: 95%; width: 100%; overflow: hidden; object-fit: cover;">
            </div>
        </div>
    </div>

    <div id="landing-overview" class="content-bg-2 py-5">
        <div class="container row mx-auto">
            <div class="col-md-6 text-center my-4 py-auto">
                <img class="col-10 mx-auto" src="{{ url('images/santri.jpg') }}"
                    style="height: auto; width: 90%; overflow: hidden; object-fit: cover;">
            </div>

            <div class="col-md-6">
                <h2 class="text-blue">
                    <b>Kembangkan Potensi Pesantren Indonesia</b>
                </h2>
                <p class="">
                    Media Pesantren Indonesia membantumu untuk menemukan potensi pesantren yang kamu butuhkan.
                    <br>
                    <br>
                    Bergabunglah bersama kami dan dapatkan:
                </p>

                <div>
                    <ul>
                        <li>
                            <span class=""> &nbsp; Informasi </span> lengkap mengenai data pesantren
                            dan potensi yang ada
                            dengan lengkap
                        </li>
                        <li>
                            <span class=""> &nbsp; Kemudahan </span> mencari potensi yang sesuai
                             dengan keinginan dan
                             kebutuhan Anda
                        </li>
                        <li>
                            &nbsp; Akses mudah </span> dari manapun dan kapanpun
                             selama terhubung
                             dengan internet
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div id="landing-modul" class="content-bg py-5">
        <div class="container px-auto">
            <div class="mb-5">
                &nbsp;
                <h2 class="">
                    <b>Informasi AKURAT dari Media Pesantren Indonesia</b>
                </h2>
                <p class="">
                    Data dan potensi yang kami kurasi sepenuh hati
                </p>
            </div>
            <div class="row col-12 mt-5 ">
                @for ($i=0; $i<count($pesantren); $i++)
                    <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                        @empty($img[$i])
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                        @endempty
                        @isset($img[$i])
                            <img src="{{ asset('storage/'. $img[$i] ) }}" class="card-img-top mx-0" alt="modul card">
                        @endisset
                        <div class="card-body bg-dark bg-gradient text-light">
                            <h5 class="card-title">{{$pesantren[$i]->nama}}</h5>
                            <p class="card-text">
                                {{$pesantren[$i]->name}}
                            </p>
                            <a href="/pesantren/view/{{$pesantren[$i]->p_id}}" class="stretched-link"></a>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-primary" href="/pesantren">Lihat Pesantren     Lainnya</a>
            </div>
        </div>

    </div>
@endsection
