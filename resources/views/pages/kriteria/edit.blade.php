@extends('layouts.master')
@section('main')
  <div class="title d-flex align-items-center">
    <a href="{{ route('kriteria.index') }}" class="text-decoration-none">
      <i class="ti-arrow-circle-left"></i>
    </a>
    <span class="ms-2">Edit Kriteria</span>
  </div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Ubah Kriteria</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('kriteria.update', $kriteria->id) }}"
              class="form-horizontal d-flex flex-column gap-3">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label for="nama" class="mb-1 control-label">Nama Kriteria</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kriteria"
                    value="{{ $kriteria->nama }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="bobot" class="mb-1 control-label">Bobot</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot"
                    value="{{ $kriteria->bobot }}" required />
                </div>
              </div>

              <button type="submit" class="btn btn-primary w-25 ms-auto">
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
