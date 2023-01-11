<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ScoreController extends Controller
{
    public function index(Request $request)
    {
        $student = Student::all();
        $subject = Subject::all();
        if ($request->ajax()) {
            $data = Score::query()->orderByRaw('created_at  DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="btn btn-primary editItem edit" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>';
                    $actionBtn = $actionBtn.'<button class="btn btn-danger ml-2" onclick="deleteConfirmation('.$row->id. ',`' .$row->nama.'`)"><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->editColumn('student_id', function ($d) {
                    return $d->student_code->nama;
                })
                ->editColumn('subject_id', function ($d) {
                    return $d->subject_code->nama;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('Data.Scores')->with(['student' => $student, 'subject' => $subject]);
    }

    public function store(Request $request)
    {
        $data =  Score::updateOrCreate(['id' => $request->id],
            [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'nilai' => $request->nilai,
            ]
        );
        return response()->json($data);
    }

    public function edit($id)
    {
        $item = Score::find($id);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $name = Score::find($id);
        $delete = Score::find($id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Data berhasil di hapus";
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

