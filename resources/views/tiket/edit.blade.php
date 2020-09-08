@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data</div>
                <div class="card-body">
                    @include('validasi')
                    {!! Form::model($tiket, ['route' => ['tiket.update',$tiket->id], 'method' => 'PUT']) !!}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Nama Tiket</label>
                        <div class="col">
                            {!! Form::text('name_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Jenis Tiket</label>
                        <div class="col">
                            {!! Form::text('jenis_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Kategori Tiket</label>
                        <div class="col">
                            {!! Form::select('id_kategori',\App\Kategori::pluck('nama_kategori','id'),NULL,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Jumlah Tiket</label>
                        <div class="col">
                            {!! Form::text('jumlah_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Harga Tiket</label>
                        <div class="col">
                            {!! Form::text('harga_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                </div>
                <div class="card-footer  d-flex justify-content-between">
                    <a href="{{ route('tiket.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update data</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
