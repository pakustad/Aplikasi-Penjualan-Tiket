@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Kategori
                    <a href="{{ route('tiket.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    @include('notifikasi')
                    <table class="table table-bordered table-hover" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tiket</th>
                                <th>Jenis Tiket</th>
                                <th>Kategori Tiket</th>
                                <th>Jumlah Tiket</th>
                                <th>Harga Tiket</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($tiket as $t)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $t->name_tiket }}</td>
                                <td>{{ $t->jenis_tiket }}</td>
                                <td>{{ $t->kategori->nama_kategori }}</td>
                                <td>{{ $t->jumlah_tiket }}</td>
                                <td> @currency($t->harga_tiket) </td>
                                <td>{{ $t->created_at->format('d M Y') }}</td>
                                <th class="d-flex">
                                    <a href="{{ route('tiket.edit', $t->id) }}" class="btn btn-sm btn-success">edit</a>
                                    {!! Form::open(['route' => ['tiket.destroy', $t->id], 'method' => 'DELETE']) !!}
                                    <button type="submit" name="submit"
                                        class="btn btn-sm btn-danger ml-2">hapus</button>
                                    {!! Form::close() !!}
                                </th>
                            </tr>
                            @php
                            $no++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable();
        });
    </script>
    @endpush
