<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::All();
        $data = [
            'masage' => 'get All Students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'masage' => 'Students is create',
            'data' => $student
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {

        $student = Student::find($id);
        if ($student){
            $data = [
                'masage' => 'Get detail Students',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'masage' => 'Date Not Found'
            ];
            return response()->json($data, 404);
        }
    }
  
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student){
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'masage' => 'Date is Update',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'masage' => 'Date Not Found'
            ];
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'masage' => 'Date is Delated'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'masage' => 'Date Not Found'
            ];
            return response()->json($data, 200);
        }
    }
}