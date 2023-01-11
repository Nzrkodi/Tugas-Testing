<div class="modal fade" id="modalTambah"  role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeader">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('data.update')}}" method="POST" id="ItemForm">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nama</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control col-md-9" name="nama" id="nama" placeholder="Masukan nama...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nim</label>
                            <input type="text" minlength="11" maxlength="11" class="form-control col-md-9" name="nim" id="nim" placeholder="Masukan nim...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control col-md-9">
                                <option selected disabled>Pilih Kelas</option>
                                <option value="T1-7-1">TI-7-1</option>
                                <option value="T1-7-2">TI-7-2</option>
                                <option value="T1-7-3">TI-7-3</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control col-md-9">
                                <option selected disabled>Pilih Jurusan</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-outline-primary">SIMPAN</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah"  role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeader">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('data.create')}}" method="POST" id="ItemForm">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nama</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control col-md-9" name="nama" id="nama" placeholder="Masukan nama...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nim</label>
                            <input type="text" minlength="11" maxlength="11" class="form-control col-md-9" name="nim" id="nim" placeholder="Masukan nim...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control col-md-9">
                                <option selected disabled>Pilih Kelas</option>
                                <option value="T1-7-1">TI-7-1</option>
                                <option value="T1-7-2">TI-7-2</option>
                                <option value="T1-7-3">TI-7-3</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control col-md-9">
                                <option selected disabled>Pilih Jurusan</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-outline-primary">SIMPAN</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>