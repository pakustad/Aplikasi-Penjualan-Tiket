@extends("layouts.app")

@section("styles")

<style>
    .expandable-body .table {
        width: 100%;
        margin: 0;
    }

    .expandable-body>td>div,
    .expandable-body>td>p {
        padding: 0;
    }
</style>

@endsection()

@section("content")

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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>INV</th>
                                    <th>Diskon</th>
                                    <th>Grand Total</th>
                                    <th>Uang dibayar</th>
                                    <th>Kembalian</th>
                                    <th>Status</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{ $transaction->inv_code }}</td>
                                    <td>{{ $transaction->discount ?? "-" }}</td>
                                    <td>{{ $transaction->grand_total }}</td>
                                    <td>{{ $transaction->money_paid }}</td>
                                    <td>{{ $transaction->change }}</td>
                                    <td>
                                        @if ($transaction->status == 1)
                                        <div class="badge badge-sm bg-success">Sukses</div>
                                        @else
                                        <div class="badge badge-sm bg-warning">Porses</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaction->status == 1)
                                        <a href="" class="btn btn-sm btn-primary">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="7">
                                        <div class="wrapper-table">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nama Tiket</th>
                                                        <th>Harga Tiket</th>
                                                        <th>Qty</th>
                                                        <th>Sub Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transaction->transactionDetails as $detail)
                                                    <tr>
                                                        <td>{{ $detail->tiket->name_tiket }}</td>
                                                        <td>{{ $detail->price }}</td>
                                                        <td>{{ $detail->qty }}</td>
                                                        <td>{{ $detail->price * $detail->qty }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection()