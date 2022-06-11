@extends('layouts.app')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kategori</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
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
            <h3 class="card-title">Kategori</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('notifikasi')
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Dibuat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if(count($kategori) >= 1)
                @php
                $no = 1;
                @endphp
                @foreach ($kategori as $k)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $k->nama_kategori }}</td>
                  <td>{{ $k->created_at->format("d M Y") }}</td>
                  <th class="d-flex">
                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-success">edit</a>
                    <button onclick="deleteCategory('{{ $k->id }}')" class="btn btn-sm btn-danger ml-2">hapus</button>
                  </th>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @endif
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
  <!-- Form Delete -->
  <form action="" id="form-delete" method="post">
    {!! Form::open(['method' => 'DELETE']) !!}
    {!! Form::close() !!}
  </form>
</section>


@endsection

@section('scripts')
<script>
  $(function() {
    $('#users-table').DataTable();
  });
</script>

<script>
  function deleteCategory(id) {
    const formDelete = document.getElementById("form-delete");
    formDelete.setAttribute("action", `<?= url("/kategori") ?>/${id}`);
    document.forms["form-delete"].submit();
  }
</script>
@stop