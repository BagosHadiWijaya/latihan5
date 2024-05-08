@extends('layouts.master')
@section('main')
  <div class="title">Data Terapis</div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>List Data Terapis</h4>
            <a class="btn btn-success" href="{{ route('terapis.create') }}">
              Tambah Terapis
            </a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Terapis</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
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
        ajax: "{{ route('terapis.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'nama',
            name: 'nama'
          },
          {
            data: 'alamat',
            name: 'alamat'
          },
          {
            data: 'jenis_kelamin',
            name: 'jenis_kelamin',
            render: function(data) {
              return data == 'L' ? 'Laki-laki' : 'Perempuan';
            }
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
