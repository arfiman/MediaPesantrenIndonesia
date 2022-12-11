@extends('layouts.app')

@section('content')
    <div class="">
        <div class="column">
            <div class="overview-bg text-white">
                <div class="container col-11 col-md-10 py-5">
                    <div class="pb-3">
                        <h1>Media Pesantren Indonesia</h1>
                        <p><b>Connecting Pesantren <span> with the world</b></span></p>
                    </div>
                    <form action="/pesantren" method="GET" class="" style="width: 100%;">
                        <div class="row my-3">
                            <div class="input-group mb-3 search d-flex">
                                <input type="text" name="keyword" class="form-control rounded-0 rounded-start"
                                    placeholder="Cari Pesantren" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2" value="{{ $keyword }}">
                                <button class="btn text-bg-secondary btn-outline-secondary rounded-0 rounded-end"
                                    type="submit" id="button-addon2"><i class="bi bi-search"></i></button>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group">
                                <select class="form-select" aria-label="Default select example" name="prov" id="provinsi">
                                    @foreach ($provinsi as $prov)
                                        <option value="{{$prov->id}}" @if($prov->id == $provinsiid) selected @endif>{{$prov->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mt-4">Filter</button>
                        </div>

                    </form>
                </div>

            </div>

            <div class="content-bg">
                <div class="container col-12 col-md-10 py-5">
                    <div class="row mt-5">
                        @for ($i = 0; $i < count($pesantren); $i++)
                            <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                                @empty($img[$i])
                                    <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                                @endempty
                                @isset($img[$i])
                                    <img src="{{ asset('storage/' . $img[$i]) }}" class="card-img-top mx-0" alt="modul card">
                                @endisset
                                <div class="card-body bg-dark bg-gradient text-light">
                                    <h5 class="card-title">{{ $pesantren[$i]->nama }}</h5>
                                    <p class="card-text">
                                        {{ $pesantren[$i]->name }}
                                    </p>
                                    <a href="/pesantren/view/{{ $pesantren[$i]->p_id }}" class="stretched-link"></a>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $pesantren->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
