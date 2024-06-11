<!-- resources/views/kas_form.blade.php -->

@extends('layouts.app_adminkit')

@section('content')
    <div class="container">

        <h1>Formulir Kas</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- @if (isset($kas))
            {!! Form::model($kas, ['route' => ['kas.update', $kas->id], 'method' => 'patch']) !!}
        @else
            {!! Form::open(['route' => 'kas.store']) !!}
        @endif --}}

        {!! Form::model($kas, [
            'route' => isset($kas->id) ? ['kas.update', $kas->id] : 'kas.store',
            'method' => isset($kas->id) ? 'PUT' : 'POST',
        ]) !!}

        <div class="form-group">
            {!! Form::label('tanggal', 'Tanggal') !!}
            {!! Form::datetimeLocal('tanggal', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('kategori', 'Kategori') !!}
            {!! Form::text('kategori', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('keterangan', 'Keterangan') !!}
            {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>

        <div class="form-group">
            <div class="form-group">
                {!! Form::label('jenis', 'Jenis') !!}
                <div>
                    <label>{!! Form::radio('jenis', 'masuk', isset($kas) && $kas->jenis == 'masuk') !!} Masuk</label>
                    <label>{!! Form::radio('jenis', 'keluar', isset($kas) && $kas->jenis == 'keluar') !!} Keluar</label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('jumlah', 'Jumlah') !!}
                {!! Form::number('jumlah', null, ['class' => 'form-control', 'required' => true]) !!}
            </div>

            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('kas.index') }}" class="btn btn-secondary">Batal</a>

            {!! Form::close() !!}
        </div>
    @endsection
