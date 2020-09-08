@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Katgori</div>
                <div class="card-body">

                    {!! Form::open(['route' => 'kategori.store','method' => 'POST']) !!}
                    <div class="form-group row">
                        <label class="col-form-label ml-2">Nama kategori</label>
                        <div class="col">
                            {!! Form::text('nama_kategori', null,['class'=>'form-control']) !!}
                            @include('validasi')
                        </div>
                    </div>
                </div>
                <div class="card-footer  d-flex justify-content-between">
                    <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah data</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
