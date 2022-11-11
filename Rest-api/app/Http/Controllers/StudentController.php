<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method index - get all resources
    function index(){
        // $user = [
        //     'nama' => 'Andre Apriyana',
        //     'jurusan' => 'Teknik Informatika'
        // ];

        // menggunakan model student untuk select data
        $students = Student::all();
        if(count($students) == true){
            $data = [
                'message' => 'get all students',
                'data' => $students,
            ];
    
            //menggunkan respose json laravel
            //otomatis set header content typr json
            //otomatis mengubah data array ke json
            //mengatur atatus code
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'student not found',
                'ststus' => 404
            ];
            // mengembalikan  data json dan status code nya 404 
            return response()->json($data, 404);
        }

    }
    // add data student
    //membuat method store
    function store(Request $request){
        //membuat validate
        $validatedData = $request->validate([
            // kolom => rules/rules
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);
        // menggunakan student untuk insert data
        $student = Student::create($validatedData);
            $data = [
                'message' => 'Data student created succesfulyy',
                'data' => $student,
            ];
            //mengembalikan data (json) status code 201
            return response()->json($data, 201);
    }

    //method get detail resource student
    function show($id){
        //Mencari data student
        $student = Student::find($id);
        //ini kondisi data ada atau tidak
        if($student){
            $data = [
                'message' => 'get detail student',
                'data' =>$student
            ];    
            // mengembalikan data json status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'student not found',
                'ststus' => 404
            ];
            // mengembalikan  data json dan status code nya 404 
            return response()->json($data, 404);
        }
    }

    // method update student
    //membaut method update
    function update(Request $request, $id){
        //mencari data yang ingin di update
        $student = Student::find($id);
        if($student){
        //mendapatkan data request
            $input = [
                'nama' =>$request->nama ?? $student->nama,
                'nim'=>$request->nim ?? $student->nim,
                'email'=>$request->email ?? $student->email,
                'jurusan'=>$request->jurusan ?? $student->jurusan,
            ];
            
            //mengupdate data
            $student->update($input);
            
            $data = [
                'message'=>'Resource student updated',
                'data'=>$student,
            ];
            //mengirimkan respon json dengan status code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message'=>'Resource student not found',
                'status'=>404
            ];
            //mengirimkan respon json dengan status code 200
            return response()->json($data, 404);
        }
            
    }
    //method delete
    function destroy($id){

        //cari data student yang ingin di hapus
        $student = Student::find($id);

        if($student){
        //hapus data student
        $student->delete();
        $data = [
            'message'=>'student is deleted',
            'status'=>200,
        ];
        //mengebalikan data json status code 200
        return response()->json($data,  200);
        }else{
            $data = [
                'message'=>'Resource student not found',
                'status'=>404
            ];
            //mengirimkan response json dengan status code 200
            return response()->json($data, 404);
        }
    }
}