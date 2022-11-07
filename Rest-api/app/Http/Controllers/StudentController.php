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

        $data = [
            'message' => 'get all students',
            'data' => $students,
        ];

        //menggunkan respose json laravel
        //otomatis set header content typr json
        //otomatis mengubah data array ke json
        //mengatur atatus code
        return response()->json($data, 200);
    }
    // add data student
    //membuat method store
    function store(Request $request){
        //menangkap request
        $input =[
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];
        // menggunakan student untuk insert data
        $student = Student::create($input);
        $data = [
            'message' => 'Data student created succesfulyy',
            'data' => $student,
        ];
        //mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }
}
