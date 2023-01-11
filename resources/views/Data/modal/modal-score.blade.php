<div class="modal fade" id="modal-score" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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
                    <form action="POST" name="ItemForm" id="ItemForm">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Mahasiswa</label>
                            <input type="hidden" name="id" id="id">
                            <select class="form-control col-md-9" name="student_id" id="student_id">
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach ($student as $i)
                                <option value="{{$i->id}}">{{$i->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Mata Kuliah</label>
                            <select class="form-control col-md-9" name="subject_id" id="subject_id">
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach ($subject as $i)
                                <option value="{{$i->id}}">{{$i->matakuliah}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Nilai</label>
                            <input type="number" class="form-control col-md-9" name="nilai" id="nilai" placeholder="Masukan Nilai...">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 mt-2">Keterangan</label>
                            <input type="number" class="form-control col-md-9" name="keterangan" id="keterangan" placeholder="Keterangan...">
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