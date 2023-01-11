<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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
                    <form action="{{route('subject.update')}}" method="POST" id="ItemForm">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Kode</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control col-md-9" name="kode" id="kode" placeholder="Kode Matakuliah...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nama Mata Kuliah</label>
                            <input type="text" class="form-control col-md-9" name="matakuliah" id="matakuliah" placeholder="Masukan nama...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">SKS</label>
                            <input type="number" class="form-control col-md-9" name="sks" id="sks" placeholder="Masukan jumlah sks...">
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

<div class="modal fade" id="modal-subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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
                    <form action="{{route('subject.create')}}" method="POST" id="ItemForm">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Kode</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control col-md-9" name="kode" id="kode" placeholder="Kode Matakuliah...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nama Mata Kuliah</label>
                            <input type="text" class="form-control col-md-9" name="matakuliah" id="matakuliah" placeholder="Masukan nama...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">SKS</label>
                            <input type="number" class="form-control col-md-9" name="sks" id="sks" placeholder="Masukan jumlah sks...">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">SIMPAN</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>