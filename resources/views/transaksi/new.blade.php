@extends("layouts.app")

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
                    <form class="form-horizontal" method="POST" action="{{url("/transaksi")}}">
                        <div class="card-body">
                            @include('validasi')
                            @include('notifikasi')
                            <table class="table table-bordered">
                                {!! Form::open(['route'=>'transaksi.store','method'=>'POST']) !!}
                                <input type="hidden" name="code" value="{{session("transactionCode")}}">
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            {!! Form::select('id_tiket',\App\Tiket::pluck('name_tiket','id'),NULL,[
                                            'class'=>'form-control',
                                            'placeholder'=>'Pilih Tiket', 'required'=> true
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

                            @foreach($transactions as $transaction)
                            <td>{{ $no }}</td>
                            <td>{{ $transaction->tiket->name_tiket }}</td>
                            <td>{{ $transaction->qty }}</td>
                            <td>@currency($transaction->tiket->harga_tiket)</td>
                            <td>@currency($transaction->tiket->harga_tiket * $transaction->qty)</td>
                            <td>
                                {!! Form::open(['route'=>['transaksi.destroy',$transaction->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <tr>
                            @php
                            $no++;
                            $total = $total+($transaction->tiket->harga_tiket*$transaction->qty);
                            @endphp
                            @endforeach
                            <td colspan="2">
                                <p align="left">Total: @currency($total)</p>
                            </td>
                            <td colspan="3"></td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    {!! Form::open(["route" => ["transaksi.rollback", session("transactionCode")], "method" => "DELETE"]) !!}
                                    <button class="btn btn-sm btn-danger mr-2" type="submit">Batal</button>
                                    {!! Form::close() !!}
                                    <a href="{{ route('transaksi.print', ['code' => session('transactionCode')] ) }}" class="btn btn btn-sm btn-primary mr-2"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('transaksi.checkout') }}" class="btn btn-sm btn-success">Selesai</a>
                                </div>
                            </td>
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