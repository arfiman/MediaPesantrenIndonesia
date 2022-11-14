@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">

            <h2 class="text-center my-5">Upload Modul</h2>

            <div class="col-lg-8 mx-auto my-5">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif

                <form action="/pesantren/upload/proses" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <b>Nama Pesantren</b>
                        <br>
                        <input type="text" name="nama">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Provinsi</b>
                        <select class="form-select" aria-label="Default select example" name="provinsiid">
                            <option selected>Open this select menu</option>
                            <option value="1">Aceh</option>
                            <option value="2">Sumatera Utara</option>
                            <option value="3">Sumatera Barat</option>
                            {{-- ... --}}
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Alamat Pesantren</b>
                        <br>
                        <input type="text" name="alamat">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Nomor Telepon Kontak</b>
                        <br>
                        <input type="text" name="notelpon">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Potensi Lahan</b>
                        <br>
                        <input type="text" name="potensi">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Pemilik Pesantren</b>
                        <br>
                        <input type="text" name="pemilik">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Tahun Berdiri</b>
                        <br>
                        <input type="text" name="tahunberdiri">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Jumlah Santri</b>
                        <br>
                        <input type="text" name="jumlahsantri">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>Jumlah Pengajar</b>
                        <br>
                        <input type="text" name="jumlahpengajar">
                    </div>
                    <br>
                    <div class="form-group">
                        <b>File Gambar</b>
                        <br />
                        <input type="file" name="images" multiple>
                    </div>
                    <br>
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
@endsection
