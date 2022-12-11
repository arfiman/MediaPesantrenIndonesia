@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">

            <h2 class="text-center my-5">Upload Data Pesantren</h2>

            <div class="col-md-7 mx-auto my-5">

                <form action="/pesantren/upload/proses" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nama" class="form-label">
                            <b class="">Nama Pesantren*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="nama" id="nama">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="provinsi" class="form-label">
                            <b class="">Provinsi*</b>
                        </label>
                        <select class="form-select" aria-label="Default select example" name="provinsiid" id="provinsi">
                            @foreach ($provinsi as $prov)
                                <option value="{{$prov->id}}">{{$prov->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="alamat" class="form-label">
                            <b class="">Alamat Pesantren*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="alamat" id="alamat">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="notelpon" class="form-label">
                            <b class="">Nomor Telepon Kontak*</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="notelpon" id="notelpon">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <b class="">Potensi Lahan*</b>
                        </label>

                        @foreach ($potensi as $pot)
                            <br>
                            <input class="form-check-input" type="checkbox" name="{{ $pot->name }}" value="{{ $pot->name }}" id="{{ $pot->name }}">
                            <label for="Perkebunan">{{ $pot->name }}</label>
                        @endforeach
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="pemilik" class="form-label">
                            <b class="">Pemilik Pesantren</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="pemilik" id="pemilik">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="tahunberdiri" class="form-label">
                            <b class="">Tahun Berdiri</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="tahunberdiri" id="tahunberdiri">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="jumlahsantri" class="form-label">
                            <b class="">Jumlah Santri</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="jumlahsantri" id="jumlahsantri">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="jumlahpengajar" class="form-label">
                            <b class="">Jumlah Pengajar</b>
                        </label>
                        <br>
                        <input class="form-control" type="text" name="jumlahpengajar" id="jumlahpengajar">
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

            <div id="modul-terupload" class="content-bg py-5">
                <div class="container px-auto">
                    <div class="mb-5">
                        &nbsp;
                        <h2 class="">
                            <b>Data Pesantren yang Sudah Anda Upload</b>
                        </h2>
                    </div>

                    <table class="table text-center">
                        <tr>
                            <th>Nama Pesantren</th>
                            <th>Provinsi</th>
                            <th>Pilihan</th>
                        </tr>
                            @foreach ($pesantren as $p)
                            <tr>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->name}}</td>
                                <td>
                                    <a class="btn btn-primary" href="/pesantren/edit/{{$p->id}}">Edit</a>

                                    <a class="btn btn-danger" href="/pesantren/delete/{{$p->id}}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $pesantren->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
