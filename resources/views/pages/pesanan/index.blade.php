@extends('layouts.master')
@section('main')
  <div class="title">Data Pesanan</div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>List Data Pesanan</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemesan</th>
                  <th>Layanan</th>
                  <th>Terapis</th>
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
        ajax: "{{ route('pesanan.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'nama',
            name: 'nama'
          },
          {
            data: 'alternatif.nama',
            name: 'alternatif.nama'
          },
          {
            data: 'terapis.nama',
            name: 'terapis.nama'
          },
        ]
      });
    });
  </script>
@endsection
