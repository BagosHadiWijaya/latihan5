@extends('layouts.master')
@section('main')
  <div class="title">Data Alternatif</div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>List Data Alternatif</h4>
            <a class="btn btn-success" href="{{ route('alternatif.create') }}">
              Tambah Alternatif
            </a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Layanan</th>
                  <th>Harga</th>
                  <th>Durasi</th>
                  <th>Deskripsi</th>
                  <th width="280px">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      /*------------------------------------------
      Render DataTable
      --------------------------------------------*/
      const table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('alternatif.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'nama',
            name: 'nama'
          },
          {
            data: 'harga',
            name: 'harga'
          },
          {
            data: 'durasi',
            name: 'durasi'
          },
          {
            data: 'deskripsi',
            name: 'deskripsi'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          },
        ]
      });
    });
  </script>
@endsection
