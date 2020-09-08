@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Kategori
                    <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    @include('notifikasi')
                    <table class="table table-bordered table-hover" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $k->nama_kategori }}</td>
                                <td>{{ $k->created_at->format("d M Y") }}</td>
                                <th class="d-flex">
                                    <a href="{{ route('kategori.edit', $k->id) }}"
                                        class="btn btn-sm btn-success">edit</a>
                                    {!! Form::open(['route' =>['kategori.destroy',$k->id],'method' => 'DELETE']) !!}
                                    <button type="submit" name="submit" class="btn btn-sm btn-danger ml-2">hapus</button>
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
