<!-- resources/views/kas_index.blade.php -->

@extends('layouts.app_adminkit')

@section('content')
    <h1>Kas Masjid</h1>
    <div class="mb-3">
        <a href="{{ route('kas.create') }}" class="btn btn-primary btn-lg">Tambah Kas</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Saldo Akhir</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kas as $index => $ka)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ka->tanggal }}</td>
                            <td>{{ $ka->kategori }}</td>
                            <td>{{ $ka->keterangan }}</td>
                            <td>{{ $ka->jenis }}</td>
                            <td>{{ $ka->jumlah }}</td>
                            <td>{{ $ka->saldo_akhir }}</td>
                            <td>{{ $ka->created_by }}</td>
                            <td>
                                <form action="{{ route('kas.destroy', $ka->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('kas.show', $ka->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('kas.edit', $ka->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
