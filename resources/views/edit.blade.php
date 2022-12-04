@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">

            <h2 class="text-center my-5">Upload Data Pesantren</h2>

            <div class="col-md-7 mx-auto my-5">

                <form action="/pesantren/edit/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="number" name="id" value="{{$pesantren->id}}" hidden>
                    <div class="form-group">
                        <label for="nama" class="form-label">
                            <b class="">Nama Pesantren*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="nama" id="nama" value="{{$pesantren->nama}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="provinsi" class="form-label">
                            <b class="">Provinsi*</b>
                        </label>
                        <select class="form-select" aria-label="Default select example" name="provinsiid" id="provinsi">
                            @foreach ($provinsi as $prov)
                                <option value="{{$prov->id}}" @if ($prov->id == $pesantren->provinsiid) selected @endif>{{$prov->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="alamat" class="form-label">
                            <b class="">Alamat Pesantren*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="alamat" id="alamat" value="{{$pesantren->alamat}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="notelpon" class="form-label">
                            <b class="">Nomor Telepon Kontak*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="notelpon" id="notelpon" value="{{$pesantren->notelpon}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <b class="">Potensi Lahan*</b>
                        </label>

                        @foreach ($potensi as $pot)
                            <br>
                            <input class="form-check-input" type="checkbox" name="{{ $pot->name }}" value="{{ $pot->name }}" id="{{ $pot->name }}" @if($pot->checked) checked @endif>
                            <label for="Perkebunan">{{ $pot->name }}</label>
                        @endforeach
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="pemilik" class="form-label">
                            <b class="">Pemilik Pesantren</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="pemilik" id="pemilik" value="{{$pesantren->pemilik}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="tahunberdiri" class="form-label">
                            <b class="">Tahun Berdiri</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="tahunberdiri" id="tahunberdiri" value="{{$pesantren->tahunberdiri}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="jumlahsantri" class="form-label">
                            <b class="">Jumlah Santri</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="jumlahsantri" id="jumlahsantri" value="{{$pesantren->jumlahsantri}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="jumlahpengajar" class="form-label">
                            <b class="">Jumlah Pengajar</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="jumlahpengajar" id="jumlahpengajar" value="{{$pesantren->jumlahpengajar}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="images" class="form-label">
                            <b class="">File Gambar</b>
                        </label>
                        <br />
                        <input class="form-control" type="file" name="images[]" id="images" multiple>
                    </div>
                    <br>
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>

            </div>

            <div class="content-bg py-5">
                <br>
                <div class="form-group">
                    <div id="modul-terupload" class="">
                        <div class="container px-auto">
                            <div class="mb-5">
                                &nbsp;
                                <h2 class="">
                                    <b>Foto Pesantren</b>
                                </h2>
                            </div>

                            <table class="table text-center">
                                <tr>
                                    <th>Foto</th>
                                    <th>Pilihan</th>
                                </tr>
                                @foreach ($foto as $f)
                                    <tr>
                                        <td><img src="{{ asset('foto_pesantren/'.$f->img) }}" alt=""></td>
                                        <td>
                                            <a class="btn btn-danger" href="/pesantren/deleteFoto/{{$f->id}}">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
