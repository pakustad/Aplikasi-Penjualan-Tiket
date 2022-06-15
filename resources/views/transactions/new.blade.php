@extends("layouts.app")

@section("styles")

<style>
    .h-500 {
        height: 300px;
        overflow: auto;
    }
</style>

@endsection()

@section("content")
<section class="content-header mb-2"></section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="h-500">
                            <form action="{{ route("transaction-details.store") }}" method="post">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ session("transactionID") }}">
                                <div class="form-group">
                                    <label for="ticket" class="col-form-label">Tiket</label>
                                    <select name="ticket" id="ticket" class="form-control" required>
                                        <option value="">Pilih Tiket</option>
                                        @foreach($tickets as $ticket)
                                        <option value="{{ $ticket->id }}">{{ $ticket->name_tiket }}</option>
                                        @endforeach;
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qty" class="col-form-label">Qty</label>
                                    <input type="number" name="qty" id="qty" required class="form-control">
                                </div>
                                <div class="form-group mt-lg-5">
                                    <button class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="h-500">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Tiket</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Sub Harga</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $grandTotal = 0; ?>
                                        @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->tiket->name_tiket }}</td>
                                            <td>@currency($transaction->price)</td>
                                            <td>{{ $transaction->qty }}</td>
                                            <?php $total = $transaction->qty * $transaction->price; ?>
                                            <?php $grandTotal += $total ?>
                                            <td class="sub">@currency($total)</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteTransactionDetail(`{{ $transaction->id }}`)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
            <div class="col-12">
                <div class="row p-1">
                    <div class="col-lg-6 ml-auto ">
                        <form action="{{ route("transactions.checkout", ["id" => session("transactionID")]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row mb-2">
                                <label for="total" class="col-form-label col-3">Total</label>
                                <div class="col-9">
                                    <input type="text" name="grand_total" value="{{ $grandTotal }}" id="dummy-total" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="discount" class="col-form-label col-3">Diskon</label>
                                <div class="col-9">
                                    <input type="text" name="discount" id="discount" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="money-paid" class="col-form-label col-3">Uang Dibayar</label>
                                <div class="col-9">
                                    <input type="text" name="money_paid" id="money-paid" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="change" class="col-form-label col-3">Kembalian</label>
                                <div class="col-9">
                                    <input type="text" name="change" id="change" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <button class="btn btn-danger btn-sm mr-2" type="button" onclick="rollback(`{{ session("transactionID") }}`)">Batal</button>
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<form action="" id="form-delete" method="post">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
</form>

<form action="" id="rollback" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
</form>

@endsection()

@section("scripts")


<script>
    function deleteTransactionDetail(id) {
        document.getElementById("form-delete").setAttribute("action", `<?= url("") ?>/transaction-details/${id}`);
        document.forms["form-delete"].submit();
    }

    function rollback(id) {
        document.getElementById("rollback").setAttribute("action", `<?= url("")  ?>/transactions/rollback/${id}`);
        document.forms["rollback"].submit();
    }

    function formatRupiah(str, prefix = "Rp ") {
        // return new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR", minimumFractionDigits: 0}).format(num)
        var number_string = str.toString().replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }

    function clearFormat(num) {
        return num.replace("Rp ", "").replace(".", "");
    }
</script>

<script>
    // Format grand total value
    document.getElementById("dummy-total").value = formatRupiah(document.getElementById("dummy-total").value)

    document.getElementById("discount").addEventListener("keyup", function(e) {
        const discount = e.target.value
        e.target.value = formatRupiah(discount.replace("Rp", "").replace(".", ""));
    });

    document.getElementById("money-paid").addEventListener("keyup", function(e) {
        const moneyPaid = e.target.value
        e.target.value = formatRupiah(moneyPaid.replace("Rp", "").replace(".", ""));
    });

    document.getElementById("discount").addEventListener("keyup", function(e) {
        const change = document.getElementById("change").value = "";
        const moneyPaid = document.getElementById("money-paid").value = "";
        const total = `{{ $grandTotal }}`;
        const discount = clearFormat(e.target.value);
        const totalPrice = total - discount;
        if (e.target.value == "") {
            document.getElementById("dummy-total").value = formatRupiah(total);
        } else {
            document.getElementById("dummy-total").value = formatRupiah(`${totalPrice}`, "rp");
        }
    });

    document.getElementById("money-paid").addEventListener("keyup", function(e) {
        const total = clearFormat(document.getElementById("dummy-total").value);
        const change = clearFormat(e.target.value) - total;
        if (!e.target.value == '' && change >= 0) {
            document.getElementById("change").value = formatRupiah(`${change}`);
        } else {
            document.getElementById("change").value = "";
        }
    });
</script>


@endsection()