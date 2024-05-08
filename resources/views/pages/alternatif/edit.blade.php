@extends('layouts.master')
@section('main')
  <div class="title d-flex align-items-center">
    <a href="{{ route('alternatif.index') }}" class="text-decoration-none">
      <i class="ti-arrow-circle-left"></i>
    </a>
    <span class="ms-2">Edit Alternatif</span>
  </div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Ubah Alternatif</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('alternatif.update', $alternatif->id) }}"
              class="form-horizontal d-flex flex-column gap-3">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label for="nama" class="mb-1 control-label">Nama Alternatif</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Alternatif"
                    value="{{ $alternatif->nama }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="harga" class="mb-1 control-label">Harga</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga"
                    value="{{ $alternatif->harga }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="durasi" class="mb-1 control-label">Durasi</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Durasi"
                    value="{{ $alternatif->durasi }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="deskripsi" class="mb-1 control-label">Deskripsi</label>
                <div class="col-sm-12">
                  <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>{{ $alternatif->deskripsi }}</textarea>
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
