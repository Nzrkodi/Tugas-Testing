<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Subject::query()->orderByRaw('created_at  DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn btn-primary editItem edit" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>';
                    $actionBtn = $actionBtn.'<button class="btn btn-danger ml-2" onclick="deleteConfirmation('.$row->id. ',`' .$row->matakuliah.'`)"><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('Data.Subjects');
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'kode' => 'required|numeric',
                'matakuliah' => 'required',
                'sks' => 'required'
            ],
            [
                'required' => 'Inputan tidak boleh kosong',
            ]
        );

        $data = Subject::where('matakuliah', $request->matakuliah)->get();

        if ($data->count()) {
            Alert::error('Gagal', 'Mata Kuliah telah terdaftar !');
            return redirect()->back();
        }
        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()->back();
        }

        $data = Subject::create([
            'kode'  => $request->kode,
            'matakuliah'  => $request->matakuliah,
            'sks'  => $request->sks
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
        $item = Subject::find($id);
        return response()->json($item);
    }

    public function updateData(Request $request)
    {
        $id = $request->id;
        $validation = Validator::make(
            $request->all(),
            [
                'kode' => 'required',
                'matakuliah' => 'required|unique:subjects,matakuliah,' . $id . '',
                'sks' => 'required'
            ],
            [
                'required' => 'Inputan tidak boleh kosong'
            ]
        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()
                ->back();
        }
        $data = [
            'kode'  => $request->kode,
            'matakuliah'  => $request->matakuliah,
            'sks'  => $request->sks
        ];

        try {
            Subject::find($id)->update($data);
            Alert::success('Berhasil', 'Data Berhasil diperbaruhi');
            return back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Ada Masalah Dengan Server');
            return back();
        }
    }

    public function destroy($id)
    {
        $name = Subject::find($id);
        $names = $name['matakuliah'];
        $delete = Subject::find($id)->delete();
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
