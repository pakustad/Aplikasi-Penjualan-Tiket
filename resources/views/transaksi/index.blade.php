@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi Tiket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Tiket</li>
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
                <h3 class="card-title">Form Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                    @include('validasi')
                    @include('notifikasi')
                    <table class="table table-bordered">
                        {!! Form::open(['route'=>'transaksi.store','method'=>'POST']) !!}
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    {!! Form::select('id_tiket',\App\Tiket::pluck('name_tiket','id'),NULL,[
                                    'class'=>'form-control',
                                    'placeholder'=>'Pilih Tiket'
                                    ]) !!}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    {!! Form::number('qty', null, ['class' => 'form-control','placeholder'=>'Qty']) !!}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="float: right; border: none;">
                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
                                <a href="{{ route('transaksi.update') }}" class="btn btn-sm btn-success">Selesai</a>
                            </td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                    </form>
                    <table class="table table-bordered">
                        <tr class="success">
                            <th colspan="6">Detail Transaksi</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Nama Tiket</th>
                            <th>Qty</th>
                            <th>Harga Tiket</th>
                            <th>Subtotal</th>
                            <th>Cancel</th>
                        </tr>
                        <tr>
                            @php
                            $no = 1;
                            $total = 0;
                            @endphp
                            @foreach ($transaksi as $tr)

                            <td>{{ $no }}</td>
                            <td>{{ $tr->tiket->name_tiket }}</td>
                            <td>{{ $tr->qty }}</td>
                            <td>@currency($tr->tiket->harga_tiket)</td>
                            <td>@currency($tr->tiket->harga_tiket*$tr->qty)</td>

                            {!! Form::open(['route'=>['transaksi.destroy',$tr->id],'method'=>'DELETE']) !!}
                            <td><button type="submit" class="btn btn-sm btn-danger">Cancel</button></td>
                            {!! Form::close() !!}

                        </tr>
                        @php
                        $no++;
                        $total = $total+($tr->tiket->harga_tiket*$tr->qty);
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <p align="right">Total</p>
                            </td>
                            <td>@currency($total)</td>
                        </tr>
                    </table>
                </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
