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
        <td>
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
        <td colspan="4">
            <p align="right">Total</p>
        </td>
        <td>@currency($total)</td>
    </tr>
</table>
