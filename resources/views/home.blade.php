@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <canvas id="myChart"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>

@php
    foreach ($transaksi as $tr ) {
        $name_kategori[] = $tr->nama_kategori;
    }
@endphp
@php
    foreach ($count as $c ) {
        $total[] = $c->count();
    }
@endphp

@endsection

@section('chart')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($name_kategori) ?>,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: <?php echo json_encode($total) ?>
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection
