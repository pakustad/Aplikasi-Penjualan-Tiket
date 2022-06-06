@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Tiket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Tiket</li>
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
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambahkan Jenis Tiket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Tiket</label>
                        <div class="col-sm-10">
                            {!! Form::text('name_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Tiket</label>
                        <div class="col-sm-10">
                            {!! Form::text('jenis_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kategori Tiket</label>
                        <div class="col-sm-10 form-group">
                            {!! Form::select('id_kategori',\App\Kategori::pluck('nama_kategori','id'),NULL,[
                                'class'=>'custom-select rounded-0',
                                'placeholder'=>'Pilih kategori'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Tiket</label>
                        <div class="col-sm-10">
                            {!! Form::text('jumlah_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Tiket</label>
                        <div class="col-sm-10">
                            {!! Form::text('harga_tiket', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                  </div>
                <div class="card-footer float-right" style="background-color: #fff;">
                    <a href="{{ route('tiket.index') }}" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
                <!-- /.card-body -->
                
                {{-- <div class="card-footer ">
                    <a href="{{ route('tiket.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Tambah data</button>
                </div> --}}
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
                    @include('validasi')
                    {!! Form::open(['route' => 'tiket.store','method' => 'POST']) !!}
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
                            {!! Form::select('id_kategori',\App\Kategori::pluck('nama_kategori','id'),NULL,[
                                'class'=>'form-control',
                                'placeholder'=>'Pilih kategori'
                            ]) !!}
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
                    <button type="submit" class="btn btn-sm btn-primary">Tambah data</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}
@endsection
