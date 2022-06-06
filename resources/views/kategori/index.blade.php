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
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($kategori as $k)
                  <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $k->nama_kategori }}</td>
                                <td>{{ $k->created_at->format("d M Y") }}</td>
                                <th class="d-flex">
                                    <a href="{{ route('kategori.edit', $k->id) }}"
                                        class="btn btn-sm btn-success">edit</a>
                                    {!! Form::open(['route' =>['kategori.destroy',$k->id],'method' => 'DELETE']) !!}
                                    <button type="submit" name="submit" class="btn btn-sm btn-danger ml-2">hapus</button>
                                    {!! Form::close() !!}
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
    </section>
  
    
@endsection

    @push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable();
        });
    </script>
    @endpush