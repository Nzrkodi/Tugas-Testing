@extends('Layouts.Base')
@section('title')
    Penilaian
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Data @yield('title')</h5>
        <button class="btn btn-primary" id="create"><i class="fa fa-plus"></i> Create</button>
      </div>
      <div class="table-responsive p-3">
        <table id="tabel-score" class="table align-items-center table-flush table-hover" >
          <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Mata kuliah</th>
                <th>Nilai</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Mata kuliah</th>
                <th>Nilai</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
</div>
@include('Data.modal.modal-score')
@endsection
@section('js')
    <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tabel-score').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('data.score')}}",
                type: 'GET'
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                },
                {
                    data: 'student_id',
                    name: 'student_id',
                },
                {
                    data: 'subject_id',
                    name: 'subject_id',
                },
                {
                    data: 'nilai',
                    name: 'nilai',
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

        $('#create').click(function () {
            $('#simpan').val("create-Item");
            $('#id').val('');
            $('#ItemForm').trigger("reset");
            $('#modalHeader').html("Tambah Data Baru");
            $('#modal-score').modal('show');
        });

        $('body').on('click', '.editItem', function () {
            var Item_id = $(this).data('id');
            $.get("/data/score/" + Item_id + '/edit', function (data) {
                $('#modalHeader').html("Edit Data");
                $('#simpan').val("edit-user");
                $('#modal-score').modal('show');
                $('#id').val(data.id);
                $('#student_id').val(data.student_id);
                $('#subject_id').val(data.subject_id);
                $('#nilai').val(data.nilai);
            })
        });

        $('#simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Mengirim...');
            $.ajax({
                data: $('#ItemForm').serialize(),
                url: "/data/score",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#ItemForm').trigger("reset");
                    $('#simpan').html("simpan");
                    $('#modal-score').modal('hide');
                    var table = $('#tabel-score').DataTable();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil di simpan !',
                        showConfirmButton: true,
                    });
                    table.draw();
                },
                error: function (data) {
                    var table = $('#tabel-score').DataTable();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Silahkan periksa kembali inputan anda!',
                        showConfirmButton: true,
                    });
                    table.draw();
                }
            });
        });

        $('#batal').on('click',function(){
            location.reload();
        });
    });

      function deleteConfirmation(id, nama) {
          swal.fire({
              title: "HAPUS?",
              text: "Yakin ingin menghapus data!",
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
                      url: "/data/score/destroy/" + id,
                      data: {
                          _token: CSRF_TOKEN
                      },
                      dataType: 'JSON',
                      success: function (results) {
                          if (results.success === true) {
                              swal.fire("Berhasil!", results.message, "success").then((result) => {
                                  var oTable = $('#tabel-score').DataTable();
                                  oTable.ajax.reload();
                              });
                          } else {
                              swal.fire("Gagal!", results.message, "error").then((result) => {
                                  var oTable = $('#tabel-score').DataTable();
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