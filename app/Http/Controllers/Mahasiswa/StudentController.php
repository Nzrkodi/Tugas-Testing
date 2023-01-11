<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::query()->orderByRaw('created_at  DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn btn-primary editItem edit" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>';
                    $actionBtn = $actionBtn.'<button class="btn btn-danger ml-2" onclick="deleteConfirmation('.$row->id. ',`' .$row->nama.'`)"><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('Data.Students');
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'nama' => 'required|min:3',
                'nim' => 'required|numeric',
                'kelas' => 'required',
                'jurusan' => 'required',
            ],
            [
                'nama.required' => 'Nama Data tidak boleh kosong',
                'nama.min' => 'Minimal Nama 3 character',
                'numeric' => 'Inputan NIM harus angka'
            ]
        );

        $data = Student::where('nama', $request->nama)->get();

        if ($data->count()) {
            Alert::error('Gagal', 'Nama telah terdaftar !');
            return redirect()->back();
        }
        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()->back();
        }

        $data = Student::create([
            'nama'  => $request->nama,
            'nim'  => $request->nim,
            'kelas'  => $request->kelas,
            'jurusan'   => $request->jurusan,
        ]);

        if ($data) {
            Alert::success('Berhasil', 'Data berhasil di buat');
            return back();
        } else {
            Alert::error('Gagal', 'Mohon periksa kembali inputan anda');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $item = Student::find($id);
        return response()->json($item);
    }

    public function updateData(Request $request)
    {
        $id = $request->id;
        $validation = Validator::make(
            $request->all(),
            [
                'nama' => 'required|unique:students,nama,' . $id . '|min:3',
                'nim' => 'required',
                'kelas' => 'required',
                'jurusan' => 'required'
            ],
            [
                'name.min' => 'Minimal Nama 3 Character',
                'name.unique' => 'Nama Telah Terdaftar'
            ]
        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()
                ->back();
        }
        $data = [
            'nama'  => $request->nama,
            'nim'  => $request->nim,
            'kelas'  => $request->kelas,
            'jurusan'   => $request->jurusan,
        ];

        try {
            Student::find($id)->update($data);
            Alert::success('Berhasil', 'Data Berhasil diperbaruhi');
            return back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Ada Masalah Dengan Server');
            return back();
        }
    }

    public function destroy($id)
    {
        $name = Student::find($id);
        $names = $name['nama'];
        $delete = Student::find($id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Data ($names) berhasil di hapus";
        } else {
            $success = true;
            $message = "Data tidak ditemukan!";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    
}
