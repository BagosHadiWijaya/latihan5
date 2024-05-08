@extends('layouts.master')
@section('main')
  <div class="title d-flex align-items-center">
    <a href="{{ route('pelanggan.index') }}" class="text-decoration-none">
      <i class="ti-arrow-circle-left"></i>
    </a>
    <span class="ms-2">Tambah Pelanggan</span>
  </div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Tambah Pelanggan</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('pelanggan.store') }}" class="form-horizontal d-flex flex-column gap-3">
              @csrf
              <div class="form-group">
                <label for="name" class="mb-1 control-label">Nama Pelanggan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pelanggan"
                    value="{{ old('name') }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="mb-1 control-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="mb-1 control-label">Password</label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    value="{{ old('password') }}" required />
                </div>
              </div>

              <div class="form-group">
                <label for="password_confirmation" class="mb-1 control-label">Konfirmasi Password</label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Konfirmasi Password" value="{{ old('password_confirmation') }}" required />
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
