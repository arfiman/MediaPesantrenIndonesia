@extends('layouts.app')

@section('content')
    <div class="">
        <div class="column">
            <div class="overview-bg text-white">
                <div class="container col-11 col-md-10 py-5">
                    <div class="pb-3">
                        <h1>Modul Mahir</h1>
                        <h6>Tempatmu belajar dan menjadi tak terduga!</h6>
                    </div>

                    <div class="row my-3">
                        <div class="input-group mb-3 search">
                            <form action="/modul/cari" method="GET" class="d-flex" style="width: 100%;">
                                    <input type="text" name="cari" class="form-control rounded-0 rounded-start" placeholder="Search Community"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <button class="btn text-bg-secondary btn-outline-secondary rounded-0 rounded-end" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content-bg">
                <div class="container col-12 col-md-10 py-5">
                    <div class="row mt-5">
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card col-12 col-sm-6 col-md-4 m-2 px-0 border-0">
                            <img src="{{ url('images/santri.jpg') }}" class="card-img-top mx-0" alt="modul card">
                            <div class="card-body bg-dark bg-gradient text-light">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
