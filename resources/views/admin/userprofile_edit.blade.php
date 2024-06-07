@extends('layouts.app_adminkit')

@section('content')
    <h1 class="h3 mb-3">Edit Profile {{ auth()->user()->name }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model(auth()->user(), [
                        // mengisi nilai input berdasarkan data dari model tersebut secara otomatis
                        'method' => 'PUT',
                        'route' => ['myprofile.update', 0],
                    ]) !!}

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Email</label>
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telp">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('password') !!}</span>
                    </div>

                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary ']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
