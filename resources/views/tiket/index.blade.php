@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tiket</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tiket</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tiket</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('notifikasi')
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tiket</th>
                  <th>Jenis Tiket</th>
                  <th>Kategori Tiket</th>
                  <th>Jumlah Tiket</th>
                  <th>Harga Tiket</th>
                  <th>Created At</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($tiket as $t)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $t->name_tiket }}</td>
                  <td>{{ $t->jenis_tiket }}</td>
                  <td>{{ $t->kategori->nama_kategori }}</td>
                  <td>{{ $t->jumlah_tiket }}</td>
                  <td> @currency($t->harga_tiket) </td>
                  <td>{{ $t->created_at->format('d M Y') }}</td>
                  <th class="d-flex">
                    <a href="{{ route('tiket.edit', $t->id) }}" class="btn btn-sm btn-success">edit</a>
                    <button type="button" onclick="deleteTicket('{{$t->id}}')" class="btn btn-sm btn-danger ml-2">hapus</button>
                  </th>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  <form action="" method="post" id="form-delete">
    {!! Form::open(['method' => 'DELETE']) !!}
    {!! Form::close() !!}
  </form>
</section>

@endsection

@push('scripts')
<script>
  $(function() {
    $('#users-table').DataTable();
  });
</script>
@endpush


@section("scripts")
<script>
  function deleteTicket(id) {
    const formDelete = document.getElementById("form-delete");
    formDelete.setAttribute("action", `<?= url("/tiket") ?>/${id}`);
    document.forms["form-delete"].submit();
  }
</script>
@stop