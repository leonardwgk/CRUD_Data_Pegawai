@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-3">Data Pegawai</h1>
    <a href="/tambah" type="button" class="btn btn-success">Tambah +</a>
    <div class="row mt-2 g-3 align-items-center">
      <div class="col-auto">
        <form action="/" method="GET">
          <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
    </div>
    @if($message = Session::get('success'))
      <div class="alert alert-success mt-4" role="alert">
        {{ $message }}
      </div>
    @endif
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telpon</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
              $i = 1
            @endphp
            {{-- $data itu diambil dari EmployeeController.php (didalam compact) --}}
            @foreach ($data as $index => $row)
            <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jeniskelamin }}</td>
                <td>{{ $row->notelpon }}</td>
                <td>
                  <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                  <form action="/delete/{{ $row->id }}" method="post">
                    @csrf
                    @method('delete')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                  </form>

                  {{-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="/delete/{{ $row->id }}" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{  $data->links() }}
@endsection