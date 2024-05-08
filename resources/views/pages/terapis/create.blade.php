@extends('layouts.master')
@section('main')
  <div class="title d-flex align-items-center">
    <a href="{{ route('terapis.index') }}" class="text-decoration-none">
      <i class="ti-arrow-circle-left"></i>
    </a>
    <span class="ms-2">Tambah Terapis</span>
  </div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Tambah Terapis</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('terapis.store') }}" class="form-horizontal d-flex flex-column gap-3">
              @csrf
              <div class="form-group">
                <label for="nama" class="mb-1 control-label">Nama Terapis</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Terapis"
                    value="{{ old('nama') }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="jenis_kelamin" class="mb-1 control-label">Jenis Kelamin</label>
                <div class="col-sm-12">
                  <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="alamat" class="mb-1 control-label">Alamat</label>
                <div class="col-sm-12">
                  <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                </div>
              </div>

              <button type="submit" class="btn btn-primary w-25 ms-auto">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
