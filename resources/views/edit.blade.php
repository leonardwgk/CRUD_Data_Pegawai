@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">Edit Data Pegawai</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                  <form action="/updatedata/{{ $data->id }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                          <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                            <option selected>{{ $data->jeniskelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                          <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->notelpon }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection