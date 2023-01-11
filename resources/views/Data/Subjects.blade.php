@extends('Layouts.Base')
@section('title')
    Mata Kuliah
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Data @yield('title')</h5>
        <button class="btn btn-primary" id="create" data-toggle="modal" data-target="#modal-subject"><i class="fa fa-plus"></i> Create</button>
    </div>
      <div class="table-responsive p-3">
        <table id="tabledata" class="table align-items-center table-flush table-hover" >
          <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @include('Data.modal.modal-subject')
@endsection
@section('js')
    <script>
          $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tabledata').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/data/subject",
                type: 'GET'
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                },
                {
                    data: 'kode',
                    name: 'kode',
                },
                {
                    data: 'matakuliah',
                    name: 'matakuliah',
                },
                {
                    data: 'sks',
                    name: 'sks',
                },
                {
                    data: 'action',
                    name: 'action',

                    orderable: false,
                    searchable: false
                },
            ],
            order: [
            [0, 'desc']
        ]
        });

        $('body').on('click', '.editItem', function () {
            var dataId = $(this).data('id');
            $.get("/data/subject/" + dataId + '/edit', function (data) {
                $('#modalTambah').modal('show');
                $('#id').val(data.id);
                $('#kode').val(data.kode);
                $('#matakuliah').val(data.matakuliah);
                $('#sks').val(data.sks);
            })
        });

        $('#batal').on('click',function(){
            location.reload();
        });
    });

    function deleteConfirmation(id, nama) {
          swal.fire({
              title: "HAPUS?",
              text: "Yakin ingin menghapus data (" + nama + ") !",
              icon: "warning",
              showCancelButton: !0,
              cancelButtonText: "Tidak, batal!",
              confirmButtonText: "Ya, Hapus!",
              confirmButtonColor: '#ff0000',
              reverseButtons: 0
          }).then(function (e) {
              if (e.value === true) {
                  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      type: 'POST',
                      url: "/data/subject/destroy/" + id,
                      data: {
                          _token: CSRF_TOKEN
                      },
                      dataType: 'JSON',
                      success: function (results) {
                          if (results.success === true) {
                              swal.fire("Berhasil!", results.message, "success").then((result) => {
                                  var oTable = $('#tabledata').DataTable();
                                  oTable.ajax.reload();
                              });
                          } else {
                              swal.fire("Gagal!", results.message, "error").then((result) => {
                                  var oTable = $('#tabledata').DataTable();
                                  oTable.ajax.reload();
                              });
                          }
                      }
                  });
              } else {
                  e.dismiss;
              }
          }, function (dismiss) {
              return false;
          })
      }
    </script>
@endsection