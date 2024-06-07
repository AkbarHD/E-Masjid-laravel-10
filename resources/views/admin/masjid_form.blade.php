@extends('layouts.app_adminkit')

@section('content')
    <h1 class="h3 mb-3">Create E-Masjid</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Silahkan isi data masjid yang anda kelola
                    </h5>
                </div>
                <div class="card-body">
                    {!! Form::model($masjid, [
                        // mengisi nilai input berdasarkan data dari model tersebut secara otomatis
                        'method' => 'POST',
                        'route' => 'masjid.store',
                    ]) !!}

                    <div class="form-group mb-3">
                        <label for="nama">Nama Masjid</label>
                        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('nama') !!}</span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat Masjid</label>
                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('alamat') !!}</span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telp">No Telp / Nomor HP Pengurus</label>
                        {!! Form::text('telp', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('telp') !!}</span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email Masjid</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>

                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary ']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
