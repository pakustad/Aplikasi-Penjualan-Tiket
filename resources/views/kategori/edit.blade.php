@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Katgori</div>
                  <div class="card-body">
                    <form action="{{ url("/kategori/"). $kategori->id }}" method="post">
{!! Form::model($kategori,['route' => ['kategori.update',$kategori->id],'method' => 'PUT']) !!}
<div class="form-group row">
  <label class="col-form-label ml-2">Nama kategori</label>
  <div class="col">
    {!! Form::text('nama_kategori', null,['class'=>'form-control']) !!}
    @include('validasi')
  </div>
</div>
<div class="card-footer  d-flex justify-content-between">
  <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">Kembali</a>
  <button type="submit" class="btn btn-sm btn-primary">Update data</button>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div> --}}

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Kategori</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Kategori</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Rubah Nama Kategori Tiket</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ url("/kategori/" . $kategori->id) }}">
            {!! Form::model($kategori,['route' => ['kategori.update',$kategori->id],'method' => 'PUT']) !!}
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama kategori</label>
                {!! Form::text('nama_kategori', null,['class'=>'form-control']) !!}
                @include('validasi')
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer float-right" style="background-color: #fff;">
              <a href="{{ route('kategori.index') }}" class="btn btn-danger">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection